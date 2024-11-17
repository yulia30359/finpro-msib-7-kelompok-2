package com.example.godo

import android.annotation.SuppressLint
import android.app.AlarmManager
import android.app.AlertDialog
import android.app.PendingIntent
import android.content.Context
import android.content.Intent
import android.graphics.Color
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.RadioButton
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView
import java.text.SimpleDateFormat
import java.util.Date
import java.util.Locale

class TaskAdapter(
    private val taskList: MutableList<Any>, // Tetap menggunakan MutableList<Any> untuk mendukung header dan item
    private val onEditClickListener: (Task) -> Unit,
    private val onDeleteClickListener: (Task) -> Unit
) : RecyclerView.Adapter<RecyclerView.ViewHolder>() {

    private val VIEW_TYPE_HEADER = 0
    private val VIEW_TYPE_ITEM = 1

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): RecyclerView.ViewHolder {
        return if (viewType == VIEW_TYPE_HEADER) {
            val view = LayoutInflater.from(parent.context).inflate(R.layout.item_header, parent, false)
            HeaderViewHolder(view)
        } else {
            val view = LayoutInflater.from(parent.context).inflate(R.layout.item_task, parent, false)
            TaskViewHolder(view)
        }
    }

    override fun onBindViewHolder(holder: RecyclerView.ViewHolder, position: Int) {
        when (holder) {
            is HeaderViewHolder -> {
                val header = taskList[position] as String
                holder.bind(header)
            }
            is TaskViewHolder -> {
                val task = taskList[position] as Task
                holder.bind(task, onEditClickListener, onDeleteClickListener)
            }
        }
    }

    override fun getItemCount(): Int {
        return taskList.size
    }

    override fun getItemViewType(position: Int): Int {
        return if (taskList[position] is String) VIEW_TYPE_HEADER else VIEW_TYPE_ITEM
    }

    inner class HeaderViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
        private val textViewHeader: TextView = itemView.findViewById(R.id.textViewHeader)
        private val textViewCount: TextView = itemView.findViewById(R.id.textViewCount)

        @SuppressLint("SetTextI18n")
        fun bind(header: String) {
            textViewHeader.text = header
            val count = when (header) {
                "TUGAS HARI INI" -> countCardsInGroup("TUGAS HARI INI")
                "TUGAS BESOK" -> countCardsInGroup("TUGAS BESOK")
                "TUGAS YANG AKAN DATANG" -> countCardsInGroup("TUGAS YANG AKAN DATANG")
                else -> 0
            }
            textViewCount.text = "$count tugas" // Ubah format menjadi "0 tugas" atau "1 tugas"
        }

        private fun countCardsInGroup(group: String): Int {
            var count = 0
            var isInGroup = false
            for (item in taskList) {
                if (item is String && item == group) {
                    isInGroup = true
                } else if (item is Task && isInGroup) {
                    count++
                } else if (item is String && item != group) {
                    isInGroup = false
                }
            }
            return count
        }
    }

    inner class TaskViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
        private val radioButtonTask: RadioButton = itemView.findViewById(R.id.radioButtonTask)
        private val textViewTitle: TextView = itemView.findViewById(R.id.textViewTitle)
        private val textViewReminderTime: TextView = itemView.findViewById(R.id.textViewReminderTime)
        private val btnDelete: ImageView = itemView.findViewById(R.id.btnDelete)

        @SuppressLint("SetTextI18n")
        fun bind(task: Task, onEditClickListener: (Task) -> Unit, onDeleteClickListener: (Task) -> Unit) {
            textViewTitle.text = task.title
            radioButtonTask.isChecked = task.isChecked // Set status checked

            // Format tanggal dan waktu secara terpisah
            val dateFormat = SimpleDateFormat("EEEE, dd-MM-yyyy", Locale.getDefault())
            val timeFormat = SimpleDateFormat("HH:mm", Locale.getDefault())
            val reminderDate = dateFormat.format(Date(task.notificationTime))
            val reminderTime = timeFormat.format(Date(task.notificationTime))

            // Gabungkan tanggal dan waktu dengan string literal "pukul"
            textViewReminderTime.text = "$reminderDate, $reminderTime"

            // Set warna putih untuk RadioButton
            radioButtonTask.buttonTintList = android.content.res.ColorStateList.valueOf(Color.WHITE)

            // Handle click on the card
            itemView.setOnClickListener {
                radioButtonTask.isChecked = !radioButtonTask.isChecked
                task.isChecked = radioButtonTask.isChecked // Update status checked
                saveTasks(itemView.context) // Simpan status checked
            }

            // Handle long click on the card
            itemView.setOnLongClickListener {
                onEditClickListener(task)
                true
            }

            // Handle delete button click
            btnDelete.setOnClickListener {
                showDeleteConfirmationDialog(task, onDeleteClickListener)
            }
        }

        private fun saveTasks(context: Context) {
            val tasks = taskList.filterIsInstance<Task>()
            TaskPreferences.saveTasks(context, tasks)
        }

        private fun showDeleteConfirmationDialog(task: Task, onDeleteClickListener: (Task) -> Unit) {
            AlertDialog.Builder(itemView.context)
                .setTitle("Hapus Tugas")
                .setMessage("Apakah Anda yakin ingin menghapus tugas ini?")
                .setPositiveButton("Ya") { _, _ ->
                    onDeleteClickListener(task)
                    cancelNotification(task)
                }
                .setNegativeButton("Tidak", null)
                .show()
        }

        private fun cancelNotification(task: Task) {
            val alarmManager = itemView.context.getSystemService(Context.ALARM_SERVICE) as AlarmManager
            val intent = Intent(itemView.context, NotificationReceiver::class.java)
            val pendingIntent = PendingIntent.getBroadcast(itemView.context, task.id.hashCode(), intent, PendingIntent.FLAG_UPDATE_CURRENT or PendingIntent.FLAG_IMMUTABLE)
            alarmManager.cancel(pendingIntent)
        }
    }
}