<?php
require_once 'Controllers/UnitKerja.php';

$list_unit = $unitkerja->index();

if (isset($_POST['type']) && $_POST['type'] == 'delete') {
  $row = $unitkerja->delete($_POST['id']);
  echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
  echo "<script>window.location='?url=unit'</script>";
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
      <span><i class="fas mr-2 fa-building me-2"></i>Data Unit Kerja</span>
    </div>
    <div class="card-body">
      

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Unit Kerja</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_unit as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['nama'] ?></td>
              <td>
                <div class="d-flex justify-content-center">
                  <a href="?url=unit-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
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
      <!-- Tombol Tambah di tengah bawah -->
      <div class="add-button text-center">
        <a class="btn btn-info-custom btn-sm" href="?url=unit-input">
          <i class="fas fa-plus"></i> Tambah Unit Kerja
        </a>
      </div>
    </div>
  </div>
</div>
