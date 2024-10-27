<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Update the password here if you know it or leave it empty if no password is set.
$conn = mysqli_connect('localhost', 'root', '', 'movie_world'); // Use '' if no password is set.

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
