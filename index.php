<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repository Barang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="bg-primary py-5 text-white mb-5">
      <div class="container">
        <h1 class="display-4 fw-bold mb-2">
          <i class="bi bi-box"></i> Repository Barang
        </h1>
        <p class="lead">Sistem Manajemen Barang yang Menyenangkan & Modern</p>
      </div>
    </div>


    <div class="container mb-5">
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle-fill"></i> Kelola inventaris barang Anda dengan cara yang lebih mudah, cepat, dan menyenangkan! ✨
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <!--form ngisi-->
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">
                <i class="bi bi-plus-circle"></i> Tambah Barang Baru
              </h5>
            </div>
            <div class="card-body">
              <form id="dataForm">
                <div class="mb-3">
                  <label for="namaBarang" class="form-label">
                    <i class="bi bi-box"></i> Nama Barang
                  </label>
                  <input type="text" class="form-control" id="namaBarang" placeholder="Contoh: Laptop Gaming ASUS" required>
                </div>

                <div class="mb-3">
                  <label for="deskripsi" class="form-label">
                    <i class="bi bi-chat-left-text"></i> Deskripsi
                  </label>
                  <textarea class="form-control" id="deskripsi" placeholder="Ceritakan tentang barang ini..." rows="3"></textarea>
                </div>


                <div class="mb-3">
                  <label for="stok" class="form-label">
                    <i class="bi bi-graph-up"></i> Stok
                  </label>
                  <input type="number" class="form-control" id="stok" placeholder="Jumlah barang" min="0" required>
                </div>

                <div class="mb-3">
                  <label for="harga" class="form-label">
                    <i class="bi bi-cash-coin"></i> Harga (Rp)
                  </label>
                  <input type="number" class="form-control" id="harga" placeholder="Contoh: 500000" min="0" step="1000" required>
                </div>

                <div class="mb-3">
                  <label for="tanggal" class="form-label">
                    <i class="bi bi-calendar-event"></i> Tanggal Input
                  </label>
                  <input type="date" class="form-control" id="tanggal" required>
                </div>



                <button type="submit" class="btn btn-primary w-100">
                  <i class="bi bi-plus-lg"></i> Tambah Barang
                </button>
              </form>
            </div>
          </div>
        </div>


      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>