<?php
require_once __DIR__ . '/../config.php';
include(__DIR__ . "/Controllers/koneksi.php");

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name       = trim($_POST['name']);
    $email      = trim($_POST['email']);
    $password   = $_POST['password'];
    $cpassword  = $_POST['cpassword'];
    $user_type  = $_POST['user_type'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Email tidak valid!";
    }elseif (strlen($password) < 6) { 
        $msg = "Password harus memiliki minimal 8 karakter!";
    }  elseif ($password !== $cpassword) {
        $msg = "Konfirmasi password tidak sama!";
    } else {
        try {
            $conn = koneksi();

            $stmt = $conn->prepare("SELECT 1 FROM `login` WHERE email = :email LIMIT 1");
            $stmt->execute([':email' => $email]);

            if ($stmt->fetch()) {
                $msg = "Email sudah terdaftar!";
            } else {
                $hashed = password_hash($password, PASSWORD_DEFAULT);

                $insert = $conn->prepare("
                    INSERT INTO `login` (name, email, password, user_type)
                    VALUES (:name, :email, :password, :user_type)
                ");
                $insert->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':password' => $hashed,
                    ':user_type' => $user_type
                ]);

                header("Location: login.php");
                exit;
            }
        } catch (PDOException $e) {
            $msg = "Terjadi kesalahan database: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi - Repository Barang</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    .eye-icon {
      cursor: pointer;
    }
  </style>
</head>

<body class="bg-primary bg-gradient d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="card shadow-sm rounded-4" style="max-width: 420px; width: 100%;">
    <div class="card-header bg-primary text-white text-center rounded-top-4">
      <i class="bi bi-box fs-1"></i>
      <h3 class="fw-bold mt-2">Repository Barang</h3>
      <p class="mb-0">Silakan registrasi untuk melanjutkan</p>
    </div>

    <div class="card-body p-4">
      <?php if ($msg): ?>
        <div class="alert alert-warning py-2 text-center">
          <?= htmlspecialchars($msg) ?>
        </div>
      <?php endif; ?>

      <form method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Kata Sandi</label>
          <div class="input-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan kata sandi" required>
            <span class="input-group-text eye-icon" id="toggle-password" onclick="togglePassword()">
              <i class="bi bi-eye"></i>
            </span>
          </div>
        </div>

        <div class="mb-3">
          <label for="cpassword" class="form-label">Konfirmasi Kata Sandi</label>
          <div class="input-group">
            <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Konfirmasi kata sandi" required>
            <span class="input-group-text eye-icon" id="toggle-cpassword" onclick="toggleCPassword()">
              <i class="bi bi-eye"></i>
            </span>
          </div>
        </div>

        <div class="mb-3">
          <label for="user_type" class="form-label">Tipe Pengguna</label>
          <select class="form-control" id="user_type" name="user_type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" name="submit" class="btn btn-primary">Registrasi</button>
        </div>
      </form>

      <p class="text-center text-muted small mb-0">
        Sudah punya akun? <a href="login.php" class="text-primary fw-semibold">Masuk</a>
      </p>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="eyes.js"></script>
</body>

</html>
