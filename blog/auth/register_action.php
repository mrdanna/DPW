<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'];
    $username = $_POST['username'];
    //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password = md5($_POST['password']); // Menggunakan MD5 untuk password
    $role     = $_POST['role'];

    // Validasi sederhana
    if ($name && $username && $password && $role) {
        $stmt = $conn->prepare("INSERT INTO user (name, username, password, role) VALUES (?, ?, ?, ?)");
        
        if (!$stmt) {
            die("SQL Error: " . $conn->error); // Munculkan error jika query salah
        }

        $stmt->bind_param("ssss", $name, $username, $password, $role);

        if ($stmt->execute()) {
            echo "Registrasi berhasil. <a href='login.php'>Login di sini</a>";
        } else {
            echo "Gagal registrasi: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Semua field harus diisi.";
    }

    $conn->close();
}
?>
