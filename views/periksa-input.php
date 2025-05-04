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
  if ($_POST['type'] == 'create') {
    $id = $periksa->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=periksa'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $periksa->update($periksa_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=periksa'</script>";
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
          Tambah Pemeriksaan
        </div>
      </div>
      <div class="card-body">

        <div class="form-group">
          <label for="pasien_id">Pasien</label>
          <select class="form-control" id="pasien_id" name="pasien_id" required>
            <option value="">Pilih Pasien</option>
            <?php foreach ($list_pasien as $pasien): ?>
              <option value="<?= $pasien['id'] ?>" <?= getSafeFormValue($show_periksa, 'pasien_id') == $pasien['id'] ? 'selected' : '' ?>><?= $pasien['nama'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="paramedik_id">Paramedik</label>
          <select class="form-control" id="paramedik_id" name="paramedik_id" required>
            <option value="">Pilih Paramedik</option>
            <?php foreach ($list_paramedik as $paramedik): ?>
              <option value="<?= $paramedik['id'] ?>" <?= getSafeFormValue($show_periksa, 'paramedik_id') == $paramedik['id'] ? 'selected' : '' ?>><?= $paramedik['nama'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= getSafeFormValue($show_periksa, 'tanggal') ?>" required>
        </div>
        <div class="form-group">
          <label for="berat">Berat (kg)</label>
          <input type="number" step="0.1" class="form-control" id="berat" name="berat" value="<?= getSafeFormValue($show_periksa, 'berat') ?>" required>
        </div>
        <div class="form-group">
          <label for="tinggi">Tinggi (cm)</label>
          <input type="number" step="0.1" class="form-control" id="tinggi" name="tinggi" value="<?= getSafeFormValue($show_periksa, 'tinggi') ?>" required>
        </div>
        <div class="form-group">
          <label for="tensi">Tensi</label>
          <input type="text" class="form-control" id="tensi" name="tensi" value="<?= getSafeFormValue($show_periksa, 'tensi') ?>" required>
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= getSafeFormValue($show_periksa, 'keterangan') ?></textarea>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $periksa_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $periksa_id ?>">
        <button type="submit" class="btn btn-info-custom">
          <i class="fas fa-save me-1"></i> Submit
        </button>
      </div>
    </div>

  </form>
</div>