<?php include '../dashboard/header.php'; ?>
<?php include '../dashboard/sidebar.php'; ?>

<!-- Main Content -->
<main class="p-4 w-100 bg-light" style="min-height: 100vh;">
    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary">Data Artikel</h2>
            <a href="artikel_tambah.php" class="btn btn-success">+ Tambah Data</a>
        </div>

        <!-- Alert Pesan -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['success']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['error']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../config/koneksi.php';
                $no = 1;
                $query = $conn->query("SELECT artikel_id, judul, penulis, gambar, status FROM artikel ORDER BY artikel_id ASC");

                while ($row = $query->fetch_assoc()) {
                    $artikelId = $row['artikel_id'];
                    $judul     = htmlspecialchars($row['judul']);
                    $penulis   = htmlspecialchars($row['penulis']);
                    $gambar    = htmlspecialchars($row['gambar']);
                    $status    = $row['status'] == 1 ? 'Publis' : 'Draft';

                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$judul}</td>
                            <td>{$penulis}</td>
                            <td><img src='../uploads/{$gambar}' width='100' class='img-thumbnail'></td>
                            <td>{$status}</td>
                            <td>
                                <a href='artikel_edit.php?id={$artikelId}' class='btn btn-sm btn-primary'>Edit</a>
                                <a href='artikel_hapus.php?id={$artikelId}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php include '../dashboard/footer.php'; ?>
