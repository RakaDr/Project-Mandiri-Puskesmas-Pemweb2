<?php
require_once 'Controllers/Kelurahan.php';
require_once 'Controllers/Paramedik.php';
require_once 'Controllers/Pasien.php';
require_once 'Controllers/Periksa.php';
require_once 'Controllers/UnitKerja.php';



$total_periksa = count($periksa->index());
$total_pasien = count($pasien->index());
$total_paramedik = count($paramedik->index());
$total_kelurahan = count($kelurahan->index());
$total_unit = count($unitkerja->index());

session_start();
$username = $_SESSION['username'] ?? 'Pengguna';
?>

<style>
  .dashboard-title {
    margin: 30px 0 10px;
    font-size: 2.2rem;
    color: #2e8b57;
    font-weight: bold;
    text-align: center;
  }

  .dashboard-subtitle {
    text-align: center;
    color: #6c757d;
    margin-bottom: 30px;
    font-size: 1.1rem;
  }

  .dashboard-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 24px;
  }

  .card-summary {
    background: linear-gradient(135deg, #3cb371, #2e8b57);
    border: none;
    border-radius: 16px;
    padding: 28px;
    box-shadow: 0 8px 20px rgba(46, 139, 87, 0.2);
    text-align: center;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    color: white;
  }

  .card-summary:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 24px rgba(46, 139, 87, 0.3);
  }

  .card-summary i {
    font-size: 2.5rem;
    margin-bottom: 12px;
  }

  .card-summary h3 {
    font-size: 2.2rem;
    margin: 0;
  }

  .card-summary p {
    margin-top: 6px;
    font-size: 1.1rem;
  }

  .alert-success {
    background-color: #2e8b57;
    font-size: 1.25rem;
    border-radius: 6px;
    color: white;
    text-align: center;
    padding: 12px;
    margin-top: 20px;
  }
</style>

<div class="container mt-4">
  <div class="dashboard-title">Selamat Datang, RakaDr!</div>
  <div class="dashboard-subtitle">Berikut ringkasan data sistem informasi puskesmas</div>

  <div class="dashboard-container">
    <div class="card-summary">
      <i class="fas fa-notes-medical"></i>
      <h3><?= $total_periksa ?></h3>
      <p>Total Pemeriksaan</p>
    </div>

    <div class="card-summary">
      <i class="fas fa-procedures"></i>
      <h3><?= $total_pasien ?></h3>
      <p>Total Pasien</p>
    </div>

    <div class="card-summary">
      <i class="fas fa-user-md"></i>
      <h3><?= $total_paramedik ?></h3>
      <p>Total Paramedik</p>
    </div>

    <div class="card-summary">
      <i class="fas fa-map-marker-alt"></i>
      <h3><?= $total_kelurahan ?></h3>
      <p>Total Kelurahan</p>
    </div>

    <div class="card-summary">
      <i class="fas fa-building"></i>
      <h3><?= $total_unit ?></h3>
      <p>Total Unit Kerja</p>
    </div>
  </div>
</div>
