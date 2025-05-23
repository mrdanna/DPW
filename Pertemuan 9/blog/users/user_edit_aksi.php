<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = $_POST['id'];
    $name     = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    if ($password) {
        $hashed = md5($password);
        $stmt = $conn->prepare("UPDATE user SET name=?, username=?, password=?, role=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $username, $hashed, $role, $id);
    } else {
        $stmt = $conn->prepare("UPDATE user SET name=?, username=?, role=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $username, $role, $id);
    }

    if ($stmt->execute()) {
        header("Location: index.php?success=Data berhasil diperbarui");
    } else {
        header("Location: user_edit.php?id=$id&error=Gagal update");
    }
    exit;
}
?>
