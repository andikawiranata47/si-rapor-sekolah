<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-3"> Selamat Datang <?= session()->get('nama'); ?> </h2>
    </div>
    <!-- <a href="/login/logout">keluar</a> -->
    <br><br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>

    <?= $this->endSection() ?>