<?php
require_once 'Controllers/Kelurahan.php';
require_once 'Helpers/helper.php';

$kelurahan_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_kelurahan = $kelurahan_id ? $kelurahan->show($kelurahan_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $kelurahan->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=kelurahan'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $kelurahan->update($kelurahan_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=kelurahan'</script>";
  }
}
?>
<style>
  .card-header-info {
    background-color: #17a2b8;
    color: white;
    font-weight: bold;
  }

  .btn-info-custom {
    background-color: #17a2b8;
    color: white;
    border: none;
  }

  .btn-info-custom:hover {
    background-color: #138496;
  }

  .form-control:focus {
    border-color: #17a2b8;
    box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.25);
  }
</style>
<div class="container">
  <form method="post">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <?= $kelurahan_id ? 'Edit' : 'Tambah' ?> Kelurahan
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama">Nama Kelurahan</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_kelurahan, 'nama') ?>" required>
        </div>
        <div class="form-group">
          <label for="kec_id">ID Kecamatan</label>
          <input type="text" class="form-control" id="kec_id" name="kec_id" value="<?= getSafeFormValue($show_kelurahan, 'kec_id') ?>" required>
        </div>
      </div>
      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $kelurahan_id ? 'update' : 'create' ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
