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
              <button class="btn btn-outline-light ms-2" type="button">
                <i class="bi bi-box-arrow-right"></i> Logout
              </button>
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
              <form id="absenForm">
                <div class="mb-3">
                  <label for="namaAbsen" class="form-label">
                    <i class="bi bi-person"></i> Nama
                  </label>
                  <input type="text" class="form-control" id="namaAbsen" placeholder="Contoh: Budi Santoso" required>
                </div>

                <div class="mb-3">
                  <label for="tanggalMasuk" class="form-label">
                    <i class="bi bi-calendar-event"></i> Tanggal Masuk
                  </label>
                  <input type="date" class="form-control" id="tanggalMasuk" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                  <i class="bi bi-plus-lg"></i> Tambah Absensi
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
                  <tbody id="absenTableBody">
                  </tbody>
                </table>
              </div>
              <div id="emptyMessage" class="text-center text-muted py-4">
                <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                <p class="mt-2">Belum ada data absensi</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">
              <i class="bi bi-pencil-square"></i> Edit Absensi
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <div class="mb-3">
                <label for="editNamaAbsen" class="form-label">Nama</label>
                <input type="text" class="form-control" id="editNamaAbsen" required>
              </div>
              <div class="mb-3">
                <label for="editTanggalMasuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="editTanggalMasuk" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-check-lg"></i> Simpan Perubahan
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>