package com.example.godo

import android.content.Context
import com.google.gson.Gson
import com.google.gson.reflect.TypeToken

object TaskPreferences {

    private const val PREF_NAME = "TaskPreferences"
    private const val TASKS_KEY = "tasks"

    fun saveTasks(context: Context, tasks: List<Task>) {
        val sharedPreferences = context.getSharedPreferences(PREF_NAME, Context.MODE_PRIVATE)
        val editor = sharedPreferences.edit()
        val tasksJson = Gson().toJson(tasks)
        editor.putString(TASKS_KEY, tasksJson)
        editor.apply()
    }

    fun loadTasks(context: Context): List<Task> {
        val sharedPreferences = context.getSharedPreferences(PREF_NAME, Context.MODE_PRIVATE)
        val tasksJson = sharedPreferences.getString(TASKS_KEY, null)
        return if (tasksJson != null) {
            val type = object : TypeToken<List<Task>>() {}.type
            val tasks = Gson().fromJson<List<Task>>(tasksJson, type)
            tasks.map { task ->
                task
            }
        } else {
            emptyList()
        }
    }
}