<?php
include("/xampp/htdocs/CRUD/CRUD-Repository/View/Controllers/koneksi.php");

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name       = trim($_POST['name']);
    $email      = trim($_POST['email']);
    $password   = $_POST['password'];
    $cpassword  = $_POST['cpassword'];
    $user_type  = $_POST['user_type'];

    try {
        $conn = koneksi();

        if ($password !== $cpassword) {
            $msg = "Konfirmasi password tidak sama!";
        } else {
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
    <title>Registrasi - Repository Barang</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-primary bg-gradient d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card shadow-sm rounded-4" style="max-width: 420px; width: 100%; height: 90vh; overflow: hidden;">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
            <i class="bi bi-person-plus fs-1"></i>
            <h3 class="fw-bold mt-2">Registrasi Pengguna</h3>
            <p class="mb-0">Silakan isi data berikut untuk mendaftar</p>
        </div>

        <div class="card-body p-4" style="overflow-y: auto;">
            <?php if ($msg): ?>
                <div class="alert alert-warning py-2"><?= htmlspecialchars($msg) ?></div>
            <?php endif; ?>

            <form id="registerForm" action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">
                        <i class="bi bi-person-fill"></i> Nama Lengkap
                    </label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="bi bi-envelope-fill"></i> Email
                    </label>
                    <input type="email" class="form-control" name="email" placeholder="Masukkan email" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">
                        <i class="bi bi-person-badge"></i> Role
                    </label>
                    <select class="form-select" name="user_type" required>
                        <option value="" disabled selected>Pilih Role</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        <i class="bi bi-lock-fill"></i> Kata Sandi
                    </label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan kata sandi" required>
                </div>

                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">
                        <i class="bi bi-lock-fill"></i> Konfirmasi Kata Sandi
                    </label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Konfirmasi kata sandi" required>
                </div>

                <div class="d-grid mb-3">
                    <button name="submit" class="btn btn-primary">
                        <i class="bi bi-person-plus-fill"></i> Daftar
                    </button>
                    <p class="text-center text-muted small mt-3">udh punya akun? <a href="login.php">login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>