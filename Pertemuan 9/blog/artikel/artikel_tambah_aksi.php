<?php
// Koneksi database
include '../config/koneksi.php';

// Fungsi membuat slug
function generateSlug($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    $text = trim($text, '-');
    return $text;
}

// Ambil data dari form
$judul   = $_POST['judul'];
$slug    = generateSlug($judul);
$penulis = $_POST['penulis'];
$konten  = $_POST['konten'];
$status  = $_POST['status'];

// Tanggal sekarang
$now = date('Y-m-d H:i:s');

// Upload gambar
$gambarName = $_FILES['gambar']['name'];
$tmpName    = $_FILES['gambar']['tmp_name'];
$folder     = "../uploads/";
$targetFile = $folder . basename($gambarName);

// Cek apakah file gambar berhasil dipindahkan
if (move_uploaded_file($tmpName, $targetFile)) {
    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO artikel (judul, slug, penulis, konten, gambar, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $judul, $slug, $penulis, $konten, $gambarName, $status, $now, $now);

    if ($stmt->execute()) {
        header("Location: index.php?success=Artikel berhasil ditambahkan");
        exit;
    } else {
        header("Location: artikel_tambah.php?error=Gagal menyimpan ke database.");
        exit;
    }
} else {
    header("Location: artikel_tambah.php?error=Gagal mengupload gambar.");
    exit;
}
?>
