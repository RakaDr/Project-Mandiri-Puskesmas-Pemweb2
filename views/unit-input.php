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
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
