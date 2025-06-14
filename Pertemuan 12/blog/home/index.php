    <?php include '../dashboard/header.php'; ?>
    <?php include '../dashboard/sidebar.php'; ?>
    <?php include '../config/koneksi.php'; ?>

    <main class="p-4 w-100 bg-light" style="min-height: 100vh;">
        <div class="container bg-white p-4 rounded shadow-sm">

            <!-- Judul Halaman -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary"><i class="fas fa-tachometer-alt me-2"></i>Dashboard Artikel</h2>
            </div>

            <!-- Statistik Card -->
            <div class="row g-4 mb-4">
                <?php
                $total = $conn->query("SELECT COUNT(*) as total FROM artikel")->fetch_assoc()['total'];
                $publis = $conn->query("SELECT COUNT(*) as total FROM artikel WHERE status = 1")->fetch_assoc()['total'];
                $draft = $conn->query("SELECT COUNT(*) as total FROM artikel WHERE status = 0")->fetch_assoc()['total'];
                ?>
                <div class="col-md-4">
                    <div class="card bg-primary text-white shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Artikel</h5>
                            <h2><i class="fas fa-newspaper me-2"></i><?= $total ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Publis</h5>
                            <h2><i class="fas fa-upload me-2"></i><?= $publis ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-secondary text-white shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Draft</h5>
                            <h2><i class="fas fa-file-alt me-2"></i><?= $draft ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik -->
            <div class="card mb-4">
                <div class="card-header bg-white fw-bold">Statistik Artikel</div>
                <div class="card-body">
                    <canvas id="artikelChart" height="120"></canvas>
                </div>
            </div>

            <!-- Tambah Data Button -->
            <div class="text-end mb-3">
                <a href="../artikel/artikel_tambah.php" class="btn btn-success"><i class="fas fa-plus-circle me-1"></i>Tambah Artikel</a>
            </div>

        </div>
    </main>

    <?php include '../dashboard/footer.php'; ?>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('artikelChart').getContext('2d');
        const artikelChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Publis', 'Draft'],
                datasets: [{
                    label: 'Jumlah Artikel',
                    data: [<?= $publis ?>, <?= $draft ?>],
                    backgroundColor: ['#198754', '#6c757d'],
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: { display: true, text: 'Distribusi Artikel Berdasarkan Status' }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    </script>
