<?php
require_once __DIR__ . '/../config/koneksi.php';

$query = "SELECT * FROM artikel WHERE status = 1 ORDER BY artikel_id DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Saya</title>
    <link rel="stylesheet" href="../assets/css/front.css">
</head>
<body>

<header>
    <h1>Blog Saya</h1>
    <p>Kumpulan artikel terbaru dan menarik</p>
</header>

<div class="container">
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card">
                <?php if (!empty($row['gambar'])): ?>
                    <img src="../uploads/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>">
                <?php endif; ?>
                <div class="card-body">
                    <h3><?= htmlspecialchars($row['judul']) ?></h3>
                    <div class="meta">Oleh <?= htmlspecialchars($row['penulis']) ?></div>
                    <p><?= mb_strimwidth(strip_tags($row['konten']), 0, 120, '...') ?></p>
                    <a href="../index.php?page=detail&slug=<?= urlencode($row['slug']) ?>">Baca Selengkapnya</a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Tidak ada artikel yang ditemukan.</p>
    <?php endif; ?>
</div>

<footer>
    &copy; <?= date('Y') ?> Blog Saya. Semua hak cipta dilindungi.
</footer>

</body>
</html>
