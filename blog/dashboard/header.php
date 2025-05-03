<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Web Barokah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
        <span class="navbar-brand text-primary fw-bold">Web Barokah</span>
        <div class="dropdown ms-auto">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4 me-2"></i>
                <strong>User</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../auth/logout.php">Keluar</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="d-flex flex-grow-1">
