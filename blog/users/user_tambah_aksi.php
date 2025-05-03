<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = md5($_POST['password'] ?? '');
    $role     = $_POST['role'] ?? '';

    if ($name && $username && $password && $role) {
        $stmt = $conn->prepare("INSERT INTO user (name, username, password, role) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            header("Location: user_tambah.php?error=SQL error: " . urlencode($conn->error));
            exit;
        }

        $stmt->bind_param("ssss", $name, $username, $password, $role);
        if ($stmt->execute()) {
            header("Location: index.php?success=Data berhasil ditambahkan");
            exit;
        } else {
            header("Location: user_tambah.php?error=Gagal menambahkan data");
            exit;
        }
    } else {
        header("Location: user_tambah.php?error=Semua field wajib diisi");
        exit;
    }
}
?>
