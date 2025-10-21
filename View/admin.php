
<?php
require_once __DIR__ . '/../config.php';

require_once(CONTROLLER_PATH . "/getController.php");
require_once(CONTROLLER_PATH . "/postController.php");
require_once(CONTROLLER_PATH . "/deleteController.php");

require_once('../auth.php');
require_login();


if (isset($_POST['tambahAdmin'])) {
  $namaAdmin    = $_POST['namaAdmin'];
  $tanggalAdmin = $_POST['tanggalAdmin'];

  tambahDataAdmin($namaAdmin, $tanggalAdmin);
  header("location: admin.php");
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabel Absensi</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="bi bi-clipboard-check"></i> Tabel Absensi
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <i class="bi bi-house-door"></i> Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="bi bi-person"></i> Profile
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="btn btn-outline-light ms-2">
              <i class="bi bi-box-arrow-right"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mb-5">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <i class="bi bi-info-circle-fill"></i> Kelola data absensi dengan mudah dan terukur!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


    <div class="row g-4">
      <div class="col-lg-4">
        <div class="card shadow-sm border-0">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
              <i class="bi bi-plus-circle"></i> Tambah Absensi
            </h5>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="namaAbsen" class="form-label">
                  <i class="bi bi-person"></i> Nama
                </label>
                <input type="text" class="form-control" name="namaAdmin" placeholder="Contoh: Budiono Siregar" required>
              </div>

              <div class="mb-3">
                <label for="tanggalMasuk" class="form-label">
                  <i class="bi bi-calendar-event"></i> Tanggal Masuk
                </label>
                <input type="date" class="form-control" name="tanggalAdmin" required>
              </div>

              <button type="submit" class="btn btn-primary w-100" name="tambahAdmin">
                <i class="bi bi-plus-lg"></i> Tambah absensi
              </button>
            </form>
          </div>
        </div>
      </div>


      <div class="col-lg-8">
        <div class="card shadow-sm border-0">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
              <i class="bi bi-table"></i> Daftar Absensi
            </h5>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead class="table-primary">
                  <tr>
                    <th><i class="bi bi-hash"></i> No</th>
                    <th><i class="bi bi-person"></i> Nama</th>
                    <th><i class="bi bi-calendar-event"></i> Tanggal Masuk</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor1 = 1;
                  foreach (ambilDataAdmin() as $dataAdmin) { ?>
                    <tr>
                      <th scope="row"><?php echo $nomor1++ ?></th>
                      <td><?php echo $dataAdmin['nama_admin'] ?></td>
                      <td><?php echo date("d F Y", strtotime($dataAdmin['tanggal_admin'])) ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>