<?php
require_once __DIR__ . "/function.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = ambilSatuDataUser($id)->fetch();
}else{
    header("location: index.php");
}

if (isset($_POST['editUser'])) {
  $barang     = $_POST['barang'];
  $deskripsi  = $_POST['deskripsi'];
  $harga      = $_POST['harga'];
  $tanggal    = $_POST['tanggal'];

  editDataUser($data['id'], $barang, $deskripsi, $harga, $tanggal);

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

    .form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; 
      padding: 20px;
    }

    .form-card {
      width: 100%;
      max-width: 600px; 
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="bg-light">
  <div class="bg-primary py-5 text-white mb-5">
    <div class="container">
      <h1 class="display-4 fw-bold mb-2">
        <i class="bi bi-box"></i> Edit Repository Barang
      </h1>
    </div>
  </div>

  <div class="container mb-5 form-container">
    <div class="card shadow-sm border-0 form-card">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
          <i class="bi bi-plus-circle"></i> Edit Barang
        </h5>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="mb-3">
            <label for="namaBarang" class="form-label">
              <i class="bi bi-box"></i> Nama Barang
            </label>
            <input type="text" name="barang" class="form-control" id="namaBarang" placeholder="Contoh: Laptop Gaming ASUS" value="<?php echo $data['nama_barang'] ?>" required>
          </div>

          <div class="mb-3">
            <label for="deskripsi" class="form-label">
              <i class="bi bi-chat-left-text"></i> Deskripsi
            </label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Ceritakan tentang barang ini..." value="<?php echo $data['deskripsi_barang'] ?>" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label for="harga" class="form-label">
              <i class="bi bi-cash-coin"></i> Harga (Rp)
            </label>
            <input type="number" name="harga" class="form-control" id="harga" placeholder="Contoh: 500000" min="0" step="1000" value="<?php echo $data['harga_barang'] ?>" required>
          </div>

          <div class="mb-3">
            <label for="tanggal" class="form-label">
              <i class="bi bi-calendar-event"></i> Tanggal Input
            </label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $data['tanggal_barang'] ?>" required>
          </div>

          <button type="submit" class="btn btn-primary w-100" name="editUser">
            <i class="bi bi-plus-lg"></i> Edit
          </button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
