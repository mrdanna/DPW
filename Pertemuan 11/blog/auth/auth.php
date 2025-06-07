<?php
session_start();
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Cek koneksi dan query
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    if (!$stmt) { 
        header("Location: login.php?error=" . urlencode("Query gagal: " . $conn->error));
        exit;
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (md5($password) === $user['password']) {
            // Jika password cocok, set session dan arahkan ke dashboard
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../dashboard/index.php");
            exit;
        } else {
            // Jika password salah
            header("Location: login.php?error=" . urlencode("Password salah"));
            exit;
        }
    } else {
        header("Location: login.php?error=" . urlencode("Username tidak ditemukan"));
        exit;
    }
}
?>
