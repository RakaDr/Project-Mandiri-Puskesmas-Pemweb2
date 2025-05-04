<?php
require_once 'Controllers/Paramedik.php';
require_once 'Helpers/helper.php';

$list_paramedik = $paramedik->index();

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'delete') {
    $row = $paramedik->delete($_POST['id']);
    echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
    echo "<script>window.location='?url=paramedik'</script>";
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
      <span><i class="fas mr-2 fa-tags me-2"></i>Data Paramedik</span>
    </div>
    <div class="card-body">
      

      <table  class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Kategori</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Unit Kerja</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_paramedik as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['nama'] ?></td>
              <td><?= $row['gender'] == "L" ? "Laki-Laki" : "Perempuan" ?></td>
              <td><?= $row['tmp_lahir'] ?></td>
              <td><?= $row['tgl_lahir'] ?></td>
              <td><?= $row['kategori'] ?></td>
              <td><?= $row['telepon'] ?></td>
              <td><?= $row['alamat'] ?></td>
              <td><?= $row['nama_unit_kerja'] ?></td>
              <td>
                <div class="d-flex justify-content-center">
                  <a href="?url=paramedik-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
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
        <a class="btn btn-info-custom btn-sm" href="?url=paramedik-input">
          <i class="fas fa-plus"></i> Tambah Paramedik
        </a>
      </div>
    </div>
  </div>
</div>