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
    <div class="bg-primary py-5 text-white mb-5">
      <div class="container">
        <h1 class="display-4 fw-bold mb-2">
          <i class="bi bi-clipboard-check"></i> Tabel Absensi
        </h1>
        <p class="lead">Sistem Pencatatan Repository Barang</p>
      </div>
    </div>

    <div class="container mb-5">
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle-fill"></i> Kelola data absensi dengan mudah dan terukur! 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <!-- Form Input -->
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

        <!-- Tabel Absensi -->
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

    <!-- Edit Modal -->
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
    <script>
      let absenList = [];
      let editingId = null;

      document.addEventListener('DOMContentLoaded', () => {
        setupEventListeners();
        loadDataFromMemory();
      });

      function setupEventListeners() {
        document.getElementById('absenForm').addEventListener('submit', (e) => {
          e.preventDefault();
          tambahAbsensi();
        });

        document.getElementById('editForm').addEventListener('submit', (e) => {
          e.preventDefault();
          simpanPerubahan();
        });
      }

      function tambahAbsensi() {
        const absen = {
          id: Date.now(),
          nama: document.getElementById('namaAbsen').value,
          tanggalMasuk: document.getElementById('tanggalMasuk').value
        };

        absenList.push(absen);
        document.getElementById('absenForm').reset();
        renderTable();
        alert('Absensi berhasil ditambahkan!');
      }

      function renderTable() {
        const tbody = document.getElementById('absenTableBody');
        const emptyMessage = document.getElementById('emptyMessage');
        
        tbody.innerHTML = '';

        if (absenList.length === 0) {
          emptyMessage.style.display = 'block';
          return;
        }

        emptyMessage.style.display = 'none';

        absenList.forEach(absen => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td><strong>${absenList.indexOf(absen) + 1}</strong></td>
            <td><strong>${absen.nama}</strong></td>
            <td>
              <div>
                <i class="bi bi-calendar-event"></i> ${formatTanggal(absen.tanggalMasuk)}
                <div class="text-muted small">${absen.tanggalMasuk}</div>
              </div>
            </td>
          `;
          tbody.appendChild(row);
        });
      }

      function formatTanggal(tanggal) {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(tanggal).toLocaleDateString('id-ID', options);
      }

      function editAbsen(id) {
        const absen = absenList.find(a => a.id === id);
        if (absen) {
          editingId = id;
          document.getElementById('editNamaAbsen').value = absen.nama;
          document.getElementById('editTanggalMasuk').value = absen.tanggalMasuk;
          new bootstrap.Modal(document.getElementById('editModal')).show();
        }
      }

      function simpanPerubahan() {
        const absen = absenList.find(a => a.id === editingId);
        if (absen) {
          absen.nama = document.getElementById('editNamaAbsen').value;
          absen.tanggalMasuk = document.getElementById('editTanggalMasuk').value;
          
          renderTable();
          bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
          alert('Absensi berhasil diperbarui!');
        }
      }

      function hapusAbsen(id) {
        if (confirm('Yakin ingin menghapus data absensi ini?')) {
          absenList = absenList.filter(a => a.id !== id);
          renderTable();
          alert('Absensi berhasil dihapus!');
        }
      }

      function loadDataFromMemory() {
        if (absenList.length === 0) {
          absenList = [
            {
              id: 1,
              nama: 'Budi Santoso',
              tanggalMasuk: '2025-01-10'
            },
            {
              id: 2,
              nama: 'Siti Nurhaliza',
              tanggalMasuk: '2025-01-10'
            },
            {
              id: 3,
              nama: 'Ahmad Wijaya',
              tanggalMasuk: '2025-01-11'
            },
            {
              id: 4,
              nama: 'Rina Putri',
              tanggalMasuk: '2025-01-11'
            }
          ];
        }
        renderTable();
      }
    </script>
  </body>
</html>