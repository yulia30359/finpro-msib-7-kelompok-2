package com.example.godo

import android.annotation.SuppressLint
import android.app.AlarmManager
import android.app.DatePickerDialog
import android.app.PendingIntent
import android.content.Context
import android.content.Intent
import android.os.Build
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.NumberPicker
import android.widget.TextView
import androidx.appcompat.app.AlertDialog
import androidx.appcompat.app.AppCompatActivity
import java.text.SimpleDateFormat
import java.util.*

@Suppress("DEPRECATION")
class EditTaskActivity : AppCompatActivity() {

    private lateinit var editTextTitle: EditText
    private lateinit var editTextDescription: EditText
    private lateinit var textViewSelectedDate: TextView
    private lateinit var textViewSelectedTime: TextView
    private lateinit var btnSelectDate: Button
    private lateinit var btnOpenTimePickerModal: Button
    private lateinit var btnSaveTask: Button

    private var task: Task? = null
    private var position: Int = -1

    private var selectedYear = 0
    private var selectedMonth = 0
    private var selectedDay = 0
    private var selectedHour = 0
    private var selectedMinute = 0

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_edit_task)

        // Ubah judul ActionBar
        supportActionBar?.title = "Edit Tugas"

        // Konfigurasi ActionBar
        supportActionBar?.setDisplayHomeAsUpEnabled(true)
        supportActionBar?.setDisplayShowHomeEnabled(true)

        editTextTitle = findViewById(R.id.editTextTitle)
        editTextDescription = findViewById(R.id.editTextDescription)
        textViewSelectedDate = findViewById(R.id.textViewSelectedDate)
        textViewSelectedTime = findViewById(R.id.textViewSelectedTime)
        btnSelectDate = findViewById(R.id.btnSelectDate)
        btnOpenTimePickerModal = findViewById(R.id.btnOpenTimePickerModal)
        btnSaveTask = findViewById(R.id.btnSaveTask)

        task = intent.getParcelableExtra("task")
        position = intent.getIntExtra("position", -1)

        task?.let {
            editTextTitle.setText(it.title)
            editTextDescription.setText(it.description)
            val calendar = Calendar.getInstance().apply { timeInMillis = it.notificationTime }
            selectedYear = calendar.get(Calendar.YEAR)
            selectedMonth = calendar.get(Calendar.MONTH)
            selectedDay = calendar.get(Calendar.DAY_OF_MONTH)
            selectedHour = calendar.get(Calendar.HOUR_OF_DAY)
            selectedMinute = calendar.get(Calendar.MINUTE)
            updateSelectedDateText()
            updateSelectedTimeText()
        }

        btnSelectDate.setOnClickListener {
            showDatePickerDialog()
        }

        btnOpenTimePickerModal.setOnClickListener {
            showTimePickerModal()
        }

        btnSaveTask.setOnClickListener {
            if (validateInputs()) {
                saveTask()
            }
        }
    }

    override fun onSupportNavigateUp(): Boolean {
        onBackPressed()
        return true
    }

    private fun showDatePickerDialog() {
        val datePickerDialog = DatePickerDialog(this, { _, year, month, day ->
            selectedYear = year
            selectedMonth = month
            selectedDay = day
            updateSelectedDateText()
        }, selectedYear, selectedMonth, selectedDay)

        datePickerDialog.show()
    }

    private fun showTimePickerModal() {
        val dialogView = layoutInflater.inflate(R.layout.dialog_time_picker, null)
        val numberPickerHour = dialogView.findViewById<NumberPicker>(R.id.numberPickerHour)
        val numberPickerMinute = dialogView.findViewById<NumberPicker>(R.id.numberPickerMinute)

        numberPickerHour.minValue = 0
        numberPickerHour.maxValue = 23
        numberPickerMinute.minValue = 0
        numberPickerMinute.maxValue = 59

        // Set the previously selected time as the default value
        numberPickerHour.value = selectedHour
        numberPickerMinute.value = selectedMinute

        val alertDialog = AlertDialog.Builder(this)
            .setTitle("Atur Waktu")
            .setView(dialogView)
            .setPositiveButton("Simpan") { _, _ ->
                selectedHour = numberPickerHour.value
                selectedMinute = numberPickerMinute.value
                updateSelectedTimeText()
            }
            .setNegativeButton("Batal", null)
            .create()

        alertDialog.show()
    }

    @SuppressLint("SetTextI18n")
    private fun updateSelectedDateText() {
        if (selectedYear == 0 || selectedMonth == 0 || selectedDay == 0) {
            textViewSelectedDate.text = "Belum mengatur tanggal"
        } else {
            val dateFormat = SimpleDateFormat("EEEE, dd-MM-yyyy", Locale.getDefault())
            val calendar = Calendar.getInstance()
            calendar.set(selectedYear, selectedMonth, selectedDay)
            textViewSelectedDate.text = "Tanggal: ${dateFormat.format(calendar.time)}"
        }
    }

    @SuppressLint("SetTextI18n")
    private fun updateSelectedTimeText() {
        if (selectedHour == 0 && selectedMinute == 0) {
            textViewSelectedTime.text = "Belum mengatur waktu"
        } else {
            val timeFormat = SimpleDateFormat("HH:mm", Locale.getDefault())
            val calendar = Calendar.getInstance()
            calendar.set(Calendar.HOUR_OF_DAY, selectedHour)
            calendar.set(Calendar.MINUTE, selectedMinute)
            textViewSelectedTime.text = "Pukul: ${timeFormat.format(calendar.time)}"
        }
    }

    private fun validateInputs(): Boolean {
        val title = editTextTitle.text.toString()
        val date = textViewSelectedDate.text.toString()
        val time = textViewSelectedTime.text.toString()

        if (title.isEmpty()) {
            showErrorDialog("Judul tugas harus diisi.")
            return false
        }

        if (date == "Belum mengatur tanggal") {
            showErrorDialog("Tanggal tugas harus diisi.")
            return false
        }

        if (time == "Belum mengatur waktu") {
            showErrorDialog("Waktu tugas harus diisi.")
            return false
        }

        return true
    }

    private fun showErrorDialog(message: String) {
        AlertDialog.Builder(this)
            .setTitle("Input Error")
            .setMessage(message)
            .setPositiveButton("OK", null)
            .show()
    }

    private fun saveTask() {
        val title = editTextTitle.text.toString()
        val description = editTextDescription.text.toString()

        val calendar = Calendar.getInstance()
        calendar.set(selectedYear, selectedMonth, selectedDay, selectedHour, selectedMinute, 0)

        val updatedTask = Task(task?.id ?: UUID.randomUUID(), title, description, calendar.timeInMillis)

        // Set alarm for the updated task
        if (canScheduleExactAlarms()) {
            setAlarm(updatedTask)
        }

        val intent = Intent()
        intent.putExtra("task", updatedTask)
        intent.putExtra("position", position)
        setResult(RESULT_OK, intent)
        finish()
    }

    private fun canScheduleExactAlarms(): Boolean {
        val alarmManager = getSystemService(Context.ALARM_SERVICE) as AlarmManager
        return if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.S) {
            alarmManager.canScheduleExactAlarms()
        } else {
            true // For versions below S, assume it can schedule exact alarms
        }
    }

    private fun setAlarm(task: Task) {
        val intent = Intent(this, NotificationReceiver::class.java)
        intent.putExtra("title", task.title)
        intent.putExtra("description", task.description)
        intent.putExtra("notificationId", task.id) // Gunakan ID unik dari task

        val pendingIntent = PendingIntent.getBroadcast(this, task.id.hashCode(), intent, PendingIntent.FLAG_UPDATE_CURRENT or PendingIntent.FLAG_IMMUTABLE)

        val alarmManager = getSystemService(Context.ALARM_SERVICE) as AlarmManager
        alarmManager.setExact(AlarmManager.RTC_WAKEUP, task.notificationTime, pendingIntent)
    }
}