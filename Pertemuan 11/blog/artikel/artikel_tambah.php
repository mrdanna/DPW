<?php include '../dashboard/header.php'; ?>
<?php include '../dashboard/sidebar.php'; ?>

<!-- Main Content -->
<main class="p-4 w-100 bg-light" style="min-height: 100vh;">
    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="text-primary mb-4">Tambah Artikel</h2>

        <?php if (!empty($_GET['error'])) : ?>
            <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>

        <form method="POST" action="artikel_tambah_aksi.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="konten" class="form-label">Konten</label>
                <textarea name="konten" class="form-control" rows="6" required></textarea>
            </div>


            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="1">Publis</option>
                    <option value="0">Draft</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</main>

<?php include '../dashboard/footer.php'; ?>
