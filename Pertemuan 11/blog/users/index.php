<?php include '../dashboard/header.php'; ?>
<?php include '../dashboard/sidebar.php'; ?>

<!-- Main Content -->
<main class="p-4 w-100 bg-light" style="min-height: 100vh;">
    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary">Data User</h2>
            <a href="user_tambah.php" class="btn btn-success">+ Tambah Data</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../config/koneksi.php';
                $no = 1;
                $query = $conn->query("SELECT id, name, username, role FROM user ORDER BY id ASC");

                while ($row = $query->fetch_assoc()) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['role']}</td>
                            <td>
                                <a href='user_edit.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a>
                                <a href='user_hapus.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
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
