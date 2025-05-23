<?php

$servername = "localhost";  // Ganti dengan host database
$username = "root";         // Ganti dengan username database
$password = "";             // Ganti dengan password database
$dbname = "berita";  // Ganti dengan nama database yang sesuai

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
