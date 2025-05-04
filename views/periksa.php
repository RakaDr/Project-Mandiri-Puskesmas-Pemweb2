<?php
require_once 'Controllers/Periksa.php';
require_once 'Controllers/Pasien.php';
require_once 'Controllers/Paramedik.php';
require_once 'Helpers/helper.php';

$list_periksa = $periksa->index();
$periksa_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_periksa = $periksa_id ? $periksa->show($periksa_id) : [];

$list_pasien = $pasien->index();
$list_paramedik = $paramedik->index();

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'delete') {
    $row = $periksa->delete($_POST['id']);
    echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
    echo "<script>window.location='?url=periksa'</script>";
  }
}
?>
<style>
  .card-header-custom {
    background-color: #2e8b57; /* SeaGreen */
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    border-bottom: 1px solid #4ac98d;
  }

  .table thead {
    background-color: #2e8b57; /* SeaGreen */
    color: white;
  }

  .btn-warning {
    background-color: #3cb371; /* MediumSeaGreen */
    color: white;
    border: none;
  }

  .btn-warning:hover {
    background-color: #4ac98d;
    color: white;
  }

  .btn-info-custom {
    background-color: #3cb371;
    color: white;
    border: none;
  }

  .btn-info-custom:hover {
    background-color: #4ac98d;
    color: white;
  }

  .table td, .table th {
    vertical-align: middle;
    text-align: center;
  }

  .add-button {
    margin-top: 20px;
  }

  .action-buttons .btn {
    margin: 0 4px;
  }

  @media (max-width: 768px) {
    .action-buttons {
      flex-direction: column;
    }

    .action-buttons .btn {
      width: 100%;
      margin: 2px 0;
    }
  }
</style>


<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
      <span><i class="fas mr-2 fa-notes-medical me-2"></i>Data Pemeriksaan</span>
    </div>
    <div class="card-body">
      

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Pasien</th>
            <th>Paramedik</th>
            <th>Tanggal</th>
            <th>Berat (kg)</th>
            <th>Tinggi (cm)</th>
            <th>Tensi</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_periksa as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['nama_pasien'] ?></td>
              <td><?= $row['nama_paramedik'] ?></td>
              <td><?= $row['tanggal'] ?></td>
              <td><?= $row['berat'] ?></td>
              <td><?= $row['tinggi'] ?></td>
              <td><?= $row['tensi'] ?></td>
              <td><?= $row['keterangan'] ?></td>
              <td>
                <div class="d-flex justify-content-center">
                  <a href="?url=periksa-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
                  <form action="" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="type" value="delete">
                    <button class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        
      </table>
      <div class="add-button text-center">
        <a class="btn btn-info-custom btn-sm" href="?url=periksa-input">
          <i class="fas fa-plus"></i> Tambah Pemeriksaan
        </a>
      </div>
    </div>
  </div>
</div>