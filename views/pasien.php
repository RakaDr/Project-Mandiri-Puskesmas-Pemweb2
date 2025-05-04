<?php
require_once 'Controllers/Pasien.php';
require_once 'Helpers/helper.php';

$list_pasien = $pasien->index();

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'delete') {
    $row = $pasien->delete($_POST['id']);
    echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
    echo "<script>window.location='?url=pasien'</script>";
  }
}
?>
<style>
  .card-header-custom {
    background-color: #17a2b8;
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
  }

  .table thead {
    background-color: #17a2b8;
    color: white;
  }

  .btn-warning {
    background-color: #17a2b8;
    color: white;
    border: none;
  }

  .btn-warning:hover {
    background-color: #138496;
    color: white;
  }

  .btn-info-custom {
    background-color: #17a2b8;
    color: white;
    border: none;
  }

  .btn-info-custom:hover {
    background-color: #138496;
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
<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="mb-2">
        <a class="btn btn-success btn-sm" href="?url=pasien-input">
          Tambah Pasien
        </a>
      </div>

      <table  class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Kelurahan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_pasien as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['kode'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tmp_lahir'] ?></td>
                <td><?= $row['tgl_lahir'] ?></td>
                <td><?= $row['gender'] == "L" ? "Laki-Laki" : "Perempuan" ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['nama_kelurahan'] ?></td>
                <td>
                <div class="d-flex">
                  <a href="?url=pasien-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
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
    </div>
  </div>
</div>