<?php
include '../dashboard/header.php';
include '../dashboard/sidebar.php';
include '../config/koneksi.php';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM user WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();
?>

<main class="p-4 w-100 bg-light" style="min-height: 100vh;">
    <div class="container bg-white p-4 rounded shadow-sm">
        <h2>Edit Data User</h2>
        <form action="user_edit_aksi.php" method="POST">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</main>

<?php include '../dashboard/footer.php'; ?>
