<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="../assets/css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Menambahkan Font Awesome -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="login-container">
    <form class="login-box" action="auth.php" method="POST">
      <h2>Login Admin</h2>
      <?php if (isset($_GET['error'])): ?>
        <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>

      <div>
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div>
        <input type="password" name="password" placeholder="Password" required>
      </div>

      <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
    </form>
  </div>
</body>
</html>
