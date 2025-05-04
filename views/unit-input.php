<?php
require_once 'Controllers/UnitKerja.php';
require_once 'Helpers/helper.php';

$unit_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_unit = $unit_id ? $unitkerja->show($unit_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $unitkerja->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=unit'</script>";
  } elseif ($_POST['type'] == 'update') {
    $row = $unitkerja->update($unit_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=unit'</script>";
  }
}
?>
<style>
  .card-header-info {
    background-color: #2e8b57; /* SeaGreen */
    color: white;
    font-weight: bold;
  }

  .btn-info-custom {
    background-color: #3cb371; /* MediumSeaGreen */
    color: white;
    border: none;
  }

  .btn-info-custom:hover {
    background-color: #4ac98d; /* Light green hover */
  }

  .form-control:focus {
    border-color: #2e8b57;
    box-shadow: 0 0 0 0.2rem rgba(46, 139, 87, 0.25); /* soft green glow */
  }

  .form-label {
    font-weight: 500;
    color: #2e8b57;
  }

  .form-group {
    margin-bottom: 1rem;
  }

  .custom-select:focus {
    border-color: #2e8b57;
    box-shadow: 0 0 0 0.2rem rgba(46, 139, 87, 0.25);
  }

  .form-control, .custom-select {
    border-radius: 0.375rem;
  }
</style>

<div class="container">
  <form method="post">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <?= $unit_id ? 'Edit' : 'Tambah' ?> Unit Kerja
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama">Nama Unit Kerja</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_unit, 'nama') ?>" required>
        </div>
      </div>
      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $unit_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $unit_id ?>">
        <button type="submit" class="btn btn-info-custom">
          <i class="fas fa-save me-1"></i> Submit
        </button>
      </div>
    </div>
  </form>
</div>
