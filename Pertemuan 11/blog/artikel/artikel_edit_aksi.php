<?php
include '../config/koneksi.php';

// Fungsi membuat slug
function generateSlug($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    $text = trim($text, '-');
    return $text;
}

// Pastikan artikel_id tersedia
// if (!isset($_POST['artikel_id']) || empty($_POST['artikel_id'])) {
//     die("ID artikel tidak ditemukan.");
// }
if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("ID artikel tidak ditemukan.");
}


// Ambil data dari form
//$id      = intval($_POST['id']); // pastikan integer
$id = $_POST['id'];
$judul   = $_POST['judul'];
$slug    = generateSlug($judul);
$penulis = $_POST['penulis'];
$konten  = $_POST['konten'];
$status  = $_POST['status'];
$now     = date('Y-m-d H:i:s');

if ($_FILES['gambar']['name'] != '') {
    $gambarName = basename($_FILES['gambar']['name']);
    $tmpName    = $_FILES['gambar']['tmp_name'];
    $folder     = "../uploads/";
    $targetFile = $folder . $gambarName;

    if (move_uploaded_file($tmpName, $targetFile)) {
        $stmt = $conn->prepare("UPDATE artikel SET judul=?, slug=?, penulis=?, konten=?, gambar=?, status=?, updated_at=? WHERE artikel_id=?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("sssssssi", $judul, $slug, $penulis, $konten, $gambarName, $status, $now, $id);
    } else {
        header("Location: artikel_edit.php?id=$id&error=Gagal upload gambar baru.");
        exit;
    }
} else {
    $stmt = $conn->prepare("UPDATE artikel SET judul=?, slug=?, penulis=?, konten=?, status=?, updated_at=? WHERE artikel_id=?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssssssi", $judul, $slug, $penulis, $konten, $status, $now, $id);
}

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        header("Location: index.php?success=Artikel berhasil diperbarui");
    } else {
        header("Location: artikel_edit.php?id=$id&info=Tidak ada perubahan data.");
    }
    exit;
} else {
    die("Execute failed: " . $stmt->error);
}
?>
