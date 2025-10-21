<?php
require_once __DIR__ . '/../config.php';
session_start();

$msg = '';  
$login_status = false;  

include(__DIR__ . "/Controllers/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';

  
  if (empty($username) || !filter_var($username, FILTER_VALIDATE_EMAIL)) {
    $msg = "Email tidak valid!";
  } elseif (empty($password)) {
    $msg = "Password tidak boleh kosong!";
  } else {
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
        $login_status = false; 
      } elseif (!password_verify($password, $user['password'])) {
        $msg = "Password salah!";
        $login_status = false; 
      } else {
        $_SESSION['id_login']  = $user['id_login'];
        $_SESSION['name']      = $user['name'];
        $_SESSION['user_type'] = $user['user_type'];
        $login_status = true; 

        if ($user['user_type'] === 'admin') {
          header("Location: admin.php");
        } else {
          header("Location: user.php");
        }
        exit;
      }
    } catch (PDOException $e) {
      $msg = "Terjadi kesalahan database: " . $e->getMessage();
      $login_status = false; 
    }
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-primary bg-gradient d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="card shadow-sm rounded-4" style="max-width: 420px; width: 100%;">
    <div class="card-header bg-primary text-white text-center rounded-top-4">
      <i class="bi bi-box fs-1"></i>
      <h3 class="fw-bold mt-2">Repository Barang</h3>
      <p class="mb-0">Silakan masuk untuk melanjutkan</p>
    </div>

    <div class="card-body p-4">
      <?php if ($msg): ?>
        <div class="alert alert-warning py-2 text-center">
          <?= htmlspecialchars($msg) ?>
        </div>
      <?php endif; ?>

      <form method="post">
        <div class="mb-3">
          <label for="username" class="form-label">
            <i class="bi bi-person-fill"></i> Username / Email
          </label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username atau email" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">
            <i class="bi bi-lock-fill"></i> Kata Sandi
          </label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan kata sandi" required>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-box-arrow-in-right"></i> Masuk
          </button>
        </div>
      </form>

      <p class="text-center text-muted small mb-0">
        Belum punya akun? <a href="registrasi.php" class="text-primary fw-semibold">Registrasi</a>
      </p>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>


</html>