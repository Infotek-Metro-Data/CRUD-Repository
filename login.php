<?php
include("koneksi.php");
session_start();

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    try {
        $conn = koneksi();

        $stmt = $conn->prepare("
            SELECT id_login, name, email, password, user_type
            FROM `login`
            WHERE email = :u OR name = :u
            LIMIT 1
        ");
        $stmt->execute([':u' => $username]);
        $user = $stmt->fetch();

        if (!$user) {
            $msg = "Akun tidak ditemukan!";
        } elseif (!password_verify($password, $user['password'])) {
            $msg = "Password salah!";
        } else {
            $_SESSION['id_login']  = $user['id_login'];
            $_SESSION['name']      = $user['name'];
            $_SESSION['user_type'] = $user['user_type'];

            if ($user['user_type'] === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit;
        }
    } catch (PDOException $e) {
        $msg = "Terjadi kesalahan database: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Repository Barang</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary bg-gradient d-flex align-items-center justify-content-center" style="height:100vh;">
  <div class="card shadow rounded-4" style="max-width:420px; width:100%;">
    <div class="card-header bg-primary text-white text-center">
      <h3>Login Repository Barang</h3>
    </div>
    <div class="card-body">
      <?php if ($msg): ?>
        <div class="alert alert-warning"><?= htmlspecialchars($msg) ?></div>
      <?php endif; ?>
      <form method="post">
        <div class="mb-3">
          <label>Username / Email</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-primary">Masuk</button>
        </div>
        <p class="text-center small">Belum punya akun? <a href="registrasi.php">Daftar</a></p>
      </form>
    </div>
  </div>
</body>

</html>