package com.example.godo

import android.annotation.SuppressLint
import android.app.AlarmManager
import android.app.PendingIntent
import android.content.Context
import android.content.Intent
import android.content.pm.PackageManager
import android.net.Uri
import android.os.Build
import android.os.Bundle
import android.provider.Settings
import android.view.Menu
import android.view.MenuItem
import android.widget.ImageView
import android.widget.Toast
import android.Manifest
import androidx.annotation.RequiresApi
import androidx.appcompat.app.ActionBarDrawerToggle
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.SearchView
import androidx.core.app.ActivityCompat
import androidx.core.content.ContextCompat
import androidx.drawerlayout.widget.DrawerLayout
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.google.android.material.navigation.NavigationView
import java.util.*

@Suppress("DEPRECATION")
class MainActivity : AppCompatActivity() {

    private lateinit var drawerLayout: DrawerLayout
    private lateinit var navView: NavigationView
    private lateinit var recyclerView: RecyclerView
    private lateinit var btnAddTask: ImageView
    private lateinit var taskAdapter: TaskAdapter
    private val taskList: MutableList<Task> = mutableListOf()
    private val filteredTaskList: MutableList<Any> = mutableListOf() // Tetap menggunakan MutableList<Any>

    private val requestCodeNotificationPermission = 3
    private val requestCodeAddTask = 1
    private val requestCodeEditTask = 2

    private lateinit var toggle: ActionBarDrawerToggle

    @SuppressLint("MissingInflatedId")
    @RequiresApi(Build.VERSION_CODES.TIRAMISU)
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        drawerLayout = findViewById(R.id.drawerLayout)
        navView = findViewById(R.id.navView)
        recyclerView = findViewById(R.id.recyclerViewTasks)
        btnAddTask = findViewById(R.id.btnAddTask)

        recyclerView.layoutManager = LinearLayoutManager(this)

        taskList.addAll(TaskPreferences.loadTasks(this))
        groupTasks()
        taskAdapter = TaskAdapter(
            filteredTaskList, // Tetap menggunakan filteredTaskList yang sudah diubah tipe datanya
            onEditClickListener = { task -> editTask(task) },
            onDeleteClickListener = { task -> deleteTask(task) }
        )
        recyclerView.adapter = taskAdapter

        btnAddTask.setOnClickListener {
            val intent = Intent(this, AddTaskActivity::class.java)
            startActivityForResult(intent, requestCodeAddTask)
        }

        // Meminta izin notifikasi saat pertama kali aplikasi diinstal
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.POST_NOTIFICATIONS) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(
                this,
                arrayOf(Manifest.permission.POST_NOTIFICATIONS),
                requestCodeNotificationPermission
            )
        }

        // Handle navigation item clicks
        navView.setNavigationItemSelectedListener { menuItem ->
            when (menuItem.itemId) {
                R.id.nav_past_tasks -> {
                    val intent = Intent(this, PastTasksActivity::class.java)
                    startActivity(intent)
                }
            }
            drawerLayout.closeDrawers()
            true
        }

        // Set up the ActionBarDrawerToggle
        toggle = ActionBarDrawerToggle(this, drawerLayout, R.string.navigation_drawer_open, R.string.navigation_drawer_close)
        drawerLayout.addDrawerListener(toggle)
        toggle.syncState()

        // Show the hamburger icon in the ActionBar
        supportActionBar?.setDisplayHomeAsUpEnabled(true)
        supportActionBar?.setHomeButtonEnabled(true)
    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        menuInflater.inflate(R.menu.menu_main, menu)

        val searchItem = menu?.findItem(R.id.action_search)
        val searchView = searchItem?.actionView as SearchView

        searchView.setOnQueryTextListener(object : SearchView.OnQueryTextListener {
            override fun onQueryTextSubmit(query: String?): Boolean {
                return false
            }

            override fun onQueryTextChange(newText: String?): Boolean {
                filterTasks(newText)
                return true
            }
        })

        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        if (toggle.onOptionsItemSelected(item)) {
            return true
        }
        return super.onOptionsItemSelected(item)
    }

    @SuppressLint("NotifyDataSetChanged")
    private fun filterTasks(query: String?) {
        filteredTaskList.clear()
        if (query.isNullOrEmpty()) {
            groupTasks()
        } else {
            val searchQuery = query.toLowerCase(Locale.getDefault())
            for (task in taskList) {
                if (task.title.toLowerCase(Locale.getDefault()).contains(searchQuery)) {
                    filteredTaskList.add(task)
                }
            }
        }
        taskAdapter.notifyDataSetChanged()
    }

    private fun groupTasks() {
        filteredTaskList.clear()

        // Urutkan taskList berdasarkan waktu notifikasi
        taskList.sortBy { it.notificationTime }

        val today = Calendar.getInstance().apply {
            set(Calendar.HOUR_OF_DAY, 0)
            set(Calendar.MINUTE, 0)
            set(Calendar.SECOND, 0)
            set(Calendar.MILLISECOND, 0)
        }.timeInMillis
        val tomorrow = Calendar.getInstance().apply {
            timeInMillis = today
            add(Calendar.DAY_OF_YEAR, 1)
        }.timeInMillis
        val dayAfterTomorrow = Calendar.getInstance().apply {
            timeInMillis = tomorrow
            add(Calendar.DAY_OF_YEAR, 1)
        }.timeInMillis

        val todayTasks = taskList.filter { it.notificationTime in today until tomorrow }
        val tomorrowTasks = taskList.filter { it.notificationTime in tomorrow until dayAfterTomorrow }
        val futureTasks = taskList.filter { it.notificationTime >= dayAfterTomorrow }

        if (todayTasks.isNotEmpty()) {
            filteredTaskList.add("TUGAS HARI INI")
            filteredTaskList.addAll(todayTasks)
        }
        if (tomorrowTasks.isNotEmpty()) {
            filteredTaskList.add("TUGAS BESOK")
            filteredTaskList.addAll(tomorrowTasks)
        }
        if (futureTasks.isNotEmpty()) {
            filteredTaskList.add("TUGAS YANG AKAN DATANG")
            filteredTaskList.addAll(futureTasks)
        }
    }

    private fun editTask(task: Task) {
        val intent = Intent(this, EditTaskActivity::class.java)
        intent.putExtra("task", task)
        intent.putExtra("position", taskList.indexOf(task))
        startActivityForResult(intent, requestCodeEditTask)
    }

    @SuppressLint("NotifyDataSetChanged")
    private fun deleteTask(task: Task) {
        taskList.remove(task)
        groupTasks()
        taskAdapter.notifyDataSetChanged()
        TaskPreferences.saveTasks(this, taskList)
        cancelNotification(task)
    }

    @SuppressLint("ServiceCast")
    private fun cancelNotification(task: Task) {
        val alarmManager = getSystemService(Context.ALARM_SERVICE) as AlarmManager
        val intent = Intent(this, NotificationReceiver::class.java)
        val pendingIntent = PendingIntent.getBroadcast(
            this,
            task.id.hashCode(),
            intent,
            PendingIntent.FLAG_UPDATE_CURRENT or PendingIntent.FLAG_IMMUTABLE
        )
        alarmManager.cancel(pendingIntent)
    }

    @SuppressLint("NotifyDataSetChanged")
    @Deprecated("Deprecated in Java")
    override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        super.onActivityResult(requestCode, resultCode, data)
        if (requestCode == requestCodeAddTask && resultCode == RESULT_OK) {
            val task = data?.getParcelableExtra<Task>("task")
            task?.let {
                taskList.add(it)
                groupTasks()
                taskAdapter.notifyDataSetChanged()
                TaskPreferences.saveTasks(this, taskList)
            }
        } else if (requestCode == requestCodeEditTask && resultCode == RESULT_OK) {
            val task = data?.getParcelableExtra<Task>("task")
            val position = data?.getIntExtra("position", -1)
            task?.let {
                position?.let { pos ->
                    taskList[pos] = it
                    groupTasks()
                    taskAdapter.notifyDataSetChanged()
                    TaskPreferences.saveTasks(this, taskList)
                }
            }
        }
    }

    override fun onRequestPermissionsResult(
        requestCode: Int,
        permissions: Array<String>,
        grantResults: IntArray
    ) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults)
        if (requestCode == requestCodeNotificationPermission) {
            if (grantResults.isNotEmpty() && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                Toast.makeText(this, "Izin notifikasi diberikan", Toast.LENGTH_SHORT).show()
            } else {
                Toast.makeText(this, "Izin notifikasi diperlukan untuk menggunakan fitur ini", Toast.LENGTH_SHORT).show()
                val intent = Intent(Settings.ACTION_APPLICATION_DETAILS_SETTINGS)
                val uri = Uri.fromParts("package", packageName, null)
                intent.data = uri
                startActivity(intent)
            }
        }
    }
}