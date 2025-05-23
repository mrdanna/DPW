<?php include '../dashboard/header.php'; ?>
<?php include '../dashboard/sidebar.php'; ?>

<!-- Main Content -->
<main class="p-4 w-100 bg-light" style="min-height: 100vh;">
    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary">Data Artikel</h2>
            <a href="artikel_tambah.php" class="btn btn-success">+ Tambah Data</a>
        </div>

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
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['judul']}</td>
                            <td>{$row['penulis']}</td>
                            <td><img src='../uploads/{$row['gambar']}' width='100' class='img-thumbnail'></td>
                            <td>{$row['status']}</td>
                            <td>
                                <a href='' class='btn btn-sm btn-primary'>Edit</a>
                                <a href='' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
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
