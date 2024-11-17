package com.example.godo

import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import java.util.*

class PastTasksActivity : AppCompatActivity() {

    private lateinit var recyclerView: RecyclerView
    private lateinit var pastTaskAdapter: PastTaskAdapter
    private val pastTaskList: MutableList<Task> = mutableListOf()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_past_tasks)

        // Ubah judul ActionBar
        supportActionBar?.title = "Tugas Lampau"

        // Show the back button in the ActionBar
        supportActionBar?.setDisplayHomeAsUpEnabled(true)
        supportActionBar?.setHomeButtonEnabled(true)

        recyclerView = findViewById(R.id.recyclerViewPastTasks)
        recyclerView.layoutManager = LinearLayoutManager(this)

        // Filter tasks to only include tasks with notification time before today
        val today = Calendar.getInstance().apply {
            set(Calendar.HOUR_OF_DAY, 0)
            set(Calendar.MINUTE, 0)
            set(Calendar.SECOND, 0)
            set(Calendar.MILLISECOND, 0)
        }.timeInMillis

        pastTaskList.addAll(TaskPreferences.loadTasks(this).filter { it.notificationTime < today })
        pastTaskAdapter = PastTaskAdapter(pastTaskList)
        recyclerView.adapter = pastTaskAdapter
    }

    override fun onSupportNavigateUp(): Boolean {
        onBackPressed()
        return true
    }
}