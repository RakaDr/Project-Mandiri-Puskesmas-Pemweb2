<?php
require_once 'Controllers/Paramedik.php';
require_once 'Controllers/UnitKerja.php';
require_once 'Helpers/helper.php';

$paramedik_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_paramedik = $paramedik_id ? $paramedik->show($paramedik_id) : [];

$list_unitkerja = $unitkerja->index();

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $paramedik->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=paramedik'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $paramedik->update($paramedik_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=paramedik'</script>";
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
          Tambah Paramedik
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_paramedik, 'nama') ?>" required>
        </div>
        <div class="form-group">
          <label for="gender">Jenis Kelamin</label>
          <select class="form-control" id="gender" name="gender" required>
            <option value="L" <?= getSafeFormValue($show_paramedik, 'gender') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= getSafeFormValue($show_paramedik, 'gender') == 'P' ? 'selected' : '' ?>>Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tmp_lahir">Tempat Lahir</label>
          <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= getSafeFormValue($show_paramedik, 'tmp_lahir') ?>" required>
        </div>
        <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= getSafeFormValue($show_paramedik, 'tgl_lahir') ?>" required>
        </div>
        <div class="form-group">
          <label for="kategori">Kategori</label>
          <select class="form-control" id="kategori" name="kategori" required>
            <option value="" <?= getSafeFormValue($show_paramedik, 'kategori') == '' ? 'selected' : '' ?>>Tidak Ada</option>
            <option value="dokter" <?= getSafeFormValue($show_paramedik, 'kategori') == 'dokter' ? 'selected' : '' ?>>Dokter</option>
            <option value="perawat" <?= getSafeFormValue($show_paramedik, 'kategori') == 'perawat' ? 'selected' : '' ?>>Perawat</option>
            <option value="apoteker" <?= getSafeFormValue($show_paramedik, 'kategori') == 'apoteker' ? 'selected' : '' ?>>Apoteker</option>
          </select>
        </div>
        <div class="form-group">
          <label for="telpon">Telepon</label>
          <input type="text" class="form-control" id="telpon" name="telpon" value="<?= getSafeFormValue($show_paramedik, 'telpon') ?>" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= getSafeFormValue($show_paramedik, 'alamat') ?></textarea>
        </div>
        <div class="form-group">
          <label for="unit_kerja_id">Unit Kerja</label>
          <select class="form-control" id="unit_kerja_id" name="unit_kerja_id" required>
            <?php foreach ($list_unitkerja as $unit): ?>
              <option value="<?= $unit['id'] ?>" <?= getSafeFormValue($show_paramedik, 'unit_kerja_id') == $unit['id'] ? 'selected' : '' ?>>
                <?= $unit['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $paramedik_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $paramedik_id ?>">
        <button type="submit" class="btn btn-info-custom">
          <i class="fas fa-save me-1"></i> Submit
        </button>
      </div>
    </div>

  </form>
</div>