<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?success=Data berhasil dihapus");
    } else {
        header("Location: user.php?error=Gagal menghapus data");
    }
    exit;
}
?>
