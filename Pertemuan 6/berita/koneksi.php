<?php
$host     = "localhost";      // biasanya localhost
$user     = "root";           // default user XAMPP
$password = "";               // default password XAMPP (kosong)
$database = "berita";  // ganti dengan nama database kamu

$conn = new mysqli($host, $user, $password, $database);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
