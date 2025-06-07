<?php include '../dashboard/header.php'; ?>
<?php include '../dashboard/sidebar.php'; ?>
<?php
include '../config/koneksi.php';

// Ambil ID artikel dari URL
$id = $_GET['id'] ?? 0;
$query = $conn->prepare("SELECT * FROM artikel WHERE artikel_id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<div class='alert alert-danger'>Artikel tidak ditemukan.</div>";
    exit;
}
?>

<!-- Main Content -->
<main class="p-4 w-100 bg-light" style="min-height: 100vh;">
    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="text-primary mb-4">Edit Artikel</h2>

        <?php if (!empty($_GET['error'])) : ?>
            <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>

        <form method="POST" action="artikel_edit_aksi.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['artikel_id'] ?>">

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="<?= htmlspecialchars($data['slug']) ?>" required readonly>
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="<?= htmlspecialchars($data['penulis']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="konten" class="form-label">Konten</label>
                <textarea name="konten" class="form-control" rows="6" required><?= htmlspecialchars($data['konten']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <?php if (!empty($data['gambar'])) : ?>
                    <div class="mb-2">
                        <img src="../uploads/<?= htmlspecialchars($data['gambar']) ?>" alt="Gambar" style="max-width: 150px;">
                    </div>
                <?php endif; ?>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="1" <?= $data['status'] == '1' ? 'selected' : '' ?>>Publis</option>
                    <option value="0" <?= $data['status'] == '0' ? 'selected' : '' ?>>Draft</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</main>

<?php include '../dashboard/footer.php'; ?>
