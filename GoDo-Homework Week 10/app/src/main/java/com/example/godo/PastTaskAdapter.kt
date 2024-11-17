package com.example.godo

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView
import java.text.SimpleDateFormat
import java.util.*

class PastTaskAdapter(private val taskList: List<Task>) : RecyclerView.Adapter<PastTaskAdapter.TaskViewHolder>() {

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): TaskViewHolder {
        val view = LayoutInflater.from(parent.context).inflate(R.layout.item_past_task, parent, false)
        return TaskViewHolder(view)
    }

    override fun onBindViewHolder(holder: TaskViewHolder, position: Int) {
        val task = taskList[position]
        holder.bind(task)
    }

    override fun getItemCount(): Int {
        return taskList.size
    }

    inner class TaskViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
        private val textViewTitle: TextView = itemView.findViewById(R.id.textViewTitle)
        private val textViewReminderTime: TextView = itemView.findViewById(R.id.textViewReminderTime)

        fun bind(task: Task) {
            textViewTitle.text = task.title

            // Format tanggal dan waktu secara terpisah
            val dateFormat = SimpleDateFormat("EEEE, dd-MM-yyyy", Locale.getDefault())
            val timeFormat = SimpleDateFormat("HH:mm", Locale.getDefault())
            val reminderDate = dateFormat.format(Date(task.notificationTime))
            val reminderTime = timeFormat.format(Date(task.notificationTime))

            // Gabungkan tanggal dan waktu dengan string literal "pukul"
            textViewReminderTime.text = "$reminderDate, $reminderTime"
        }
    }
}