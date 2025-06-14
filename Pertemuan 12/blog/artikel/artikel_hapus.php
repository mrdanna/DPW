<?php
include '../config/koneksi.php';

// Pastikan ada ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?error=ID artikel tidak ditemukan.");
    exit;
}

$id = $_GET['id'];

// Ambil nama file gambar dulu
$get = $conn->prepare("SELECT gambar FROM artikel WHERE artikel_id = ?");
$get->bind_param("i", $id);
$get->execute();
$result = $get->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    header("Location: index.php?error=Artikel tidak ditemukan.");
    exit;
}

// Hapus gambar jika ada
if (!empty($data['gambar']) && file_exists("../uploads/" . $data['gambar'])) {
    unlink("../uploads/" . $data['gambar']);
}

// Hapus data artikel
$delete = $conn->prepare("DELETE FROM artikel WHERE artikel_id = ?");
$delete->bind_param("i", $id);

if ($delete->execute()) {
    header("Location: index.php?success=Artikel berhasil dihapus.");
    exit;
} else {
    header("Location: index.php?error=Gagal menghapus artikel.");
    exit;
}
?>
