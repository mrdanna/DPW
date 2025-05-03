<?php
    session_start();

    // Hapus semua data session
    $_SESSION = [];
    session_unset();
    session_destroy();

    // Arahkan ke halaman login
    header("Location: login.php?message=" . urlencode("Anda telah logout"));
    exit;
?>
