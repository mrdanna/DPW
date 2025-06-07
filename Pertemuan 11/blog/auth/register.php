<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="../assets/css/register.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="register-container">
    <form class="register-box" action="register_action.php" method="POST">
      <h2>Register User</h2>
      <input type="text" name="name" placeholder="Nama Lengkap" required>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <select name="role" required>
        <option value="">-- Pilih Role --</option>
        <option value="1">Admin</option>
        <option value="2">Editor</option>
      </select>
      
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>
