<?php
// koneksi ke database
$conn = new mysqli("localhost", "root", "", "berita");

// ambil data dari form
$name     = $_POST['name'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password

// simpan ke database
$sql = "INSERT INTO user (name, username, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $username, $password);

if ($stmt->execute()) {
    echo "Registrasi berhasil!";
} else {
    echo "Gagal: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
