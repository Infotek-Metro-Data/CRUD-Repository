<?php
require_once __DIR__ . "/function.php";
require_once __DIR__ . "/auth.php";
require_login();

if (isset($_POST['tambah'])) {
  $barang     = $_POST['barang'];
  $deskripsi  = $_POST['deskripsi'];
  $harga      = $_POST['harga'];
  $tanggal    = $_POST['tanggal'];

  tambahDataUser($barang, $deskripsi, $harga, $tanggal);

  header("location: index.php");
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  hapusDataUser($id);

  header("location: index.php");
}



?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Repository Barang</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    .container {
      max-width: 1200px;
    }

    .table th,
    .table td {
      vertical-align: middle;
    }
  </style>
</head>

<body class="bg-light">
  <div class="bg-primary py-3 text-white mb-5">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
          <i class="  bi bi-box"></i> Repository Barang
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
              <button class="btn btn-outline-light ms-2" type="button">
                <i class="bi bi-box-arrow-right"></i> Logout
              </button>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <div class="container mb-5">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <i class="bi bi-info-circle-fill"></i> Kelola inventaris barang Anda dengan cara yang lebih mudah, cepat, dan menyenangkan! ✨
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="row g-4">

      <div class="col-lg-4">
        <div class="card shadow-sm border-0">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
              <i class="bi bi-plus-circle"></i> Tambah Barang Baru
            </h5>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="namaBarang" class="form-label">
                  <i class="bi bi-box"></i> Nama Barang
                </label>
                <input type="text" name="barang" class="form-control" id="namaBarang" placeholder="Contoh: Laptop Gaming ASUS" required>
              </div>

              <div class="mb-3">
                <label for="deskripsi" class="form-label">
                  <i class="bi bi-chat-left-text"></i> Deskripsi
                </label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Ceritakan tentang barang ini..." rows="3"></textarea>
              </div>

              <div class="mb-3">
                <label for="harga" class="form-label">
                  <i class="bi bi-cash-coin"></i> Harga (Rp)
                </label>
                <input type="number" name="harga" class="form-control" id="harga" placeholder="Contoh: 500000" min="0" step="1000" required>
              </div>

              <div class="mb-3">
                <label for="tanggal" class="form-label">
                  <i class="bi bi-calendar-event"></i> Tanggal Input
                </label>
                <input type="date" name="tanggal" class="form-control" id="tanggal" required>
              </div>

              <button type="submit" class="btn btn-primary w-100 " name="tambah">
                <i class="bi bi-plus-lg"></i> Tambah Barang
              </button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <h3 class="mb-4">Daftar Barang</h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Harga (Rp)</th>
              <th scope="col">Tanggal Input</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $nomor = 1;
            foreach (ambilDataUser() as $dataUser) { ?>

              <tr>
                <td><?php echo $nomor++ ?></td>
                <td><?php echo $dataUser['nama_barang'] ?></td>
                <td><?php echo $dataUser['deskripsi_barang'] ?></td>
                <td><?php echo $dataUser['harga_barang'] ?></td>
                <td><?php echo date("d F Y", strtotime($dataUser['tanggal_barang'])) ?></td>
                <td>
                  <div class="d-flex gap-2">
                    <a href="edit.php?id=<?php echo $dataUser['id'] ?>" class="btn btn-warning btn-sm ">
                      <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="?id=<?php echo $dataUser['id'] ?>" class="btn btn-danger btn-sm" onclick=" return confirm('Apakah yakin barang ini mau dihapus?')">
                      <i class="bi bi-trash"></i> Hapus
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>