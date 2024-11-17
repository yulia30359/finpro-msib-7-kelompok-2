package com.example.godo

import android.os.Parcel
import android.os.Parcelable
import java.util.*

data class Task(
    val id: UUID, // Gunakan UUID sebagai ID unik
    val title: String,
    val description: String,
    val notificationTime: Long,
    var isChecked: Boolean = false
) : Parcelable {
    constructor(parcel: Parcel) : this(
        UUID.fromString(parcel.readString() ?: ""),
        parcel.readString() ?: "",
        parcel.readString() ?: "",
        parcel.readLong()
    )

    override fun writeToParcel(parcel: Parcel, flags: Int) {
        parcel.writeString(id.toString())
        parcel.writeString(title)
        parcel.writeString(description)
        parcel.writeLong(notificationTime)
    }

    override fun describeContents(): Int {
        return 0
    }

    companion object CREATOR : Parcelable.Creator<Task> {
        override fun createFromParcel(parcel: Parcel): Task {
            return Task(parcel)
        }

        override fun newArray(size: Int): Array<Task?> {
            return arrayOfNulls(size)
        }
    }
}