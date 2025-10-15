<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Repository Barang</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #007bff, #6ec1ff);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .login-card {
        background: #fff;
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 420px;
      }

      .login-header {
        background-color: #007bff;
        color: #fff;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        text-align: center;
        padding: 30px 20px;
      }

      .login-header i {
        font-size: 3rem;
        margin-bottom: 10px;
      }

      .btn-primary {
        background-color: #007bff;
        border: none;
      }

      .btn-primary:hover {
        background-color: #0056d2;
      }
    </style>
  </head>

  <body>
    <div class="login-card shadow">
      <div class="login-header">
        <i class="bi bi-box"></i>
        <h3 class="fw-bold mt-2">Repository Barang</h3>
        <p class="mb-0">Silakan masuk untuk melanjutkan</p>
      </div>

      <div class="card-body p-4">
        <form id="loginForm">
          <div class="mb-3">
            <label for="username" class="form-label">
              <i class="bi bi-person-fill"></i> Username
            </label>
            <input type="text" class="form-control" id="username" placeholder="Masukkan username" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">
              <i class="bi bi-lock-fill"></i> Kata sandi
            </label>
            <input type="password" class="form-control" id="password" placeholder="Masukkan password" required>
          </div>

          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-box-arrow-in-right"></i> Masuk
            </button>
          </div>

          <div class="text-center text-muted small">
            © 2025 Repository Barang — Semua Hak Dilindungi
          </div>
        </form>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
