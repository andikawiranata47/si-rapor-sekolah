<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Nilai Ekstrakurikuler </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tabel Daftar Nilai Ekstrakurikuler</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> NIS </th>
                  <th> Nama </th>
                  <th> Nama Ekstrakurikuler </th>
                  <th> Predikat </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($nilaiEkstra as $n) : ?>
                <tr>
                  <td> <?= $i++; ?> </td>
                  <td> <?= $n->NIS; ?> </td>
                  <td> <?= $n->Nama; ?> </td>
                  <td> <?= $n->Nama_Ekstrakurikuler; ?> </td>
                  <td> <?= $n->Predikat; ?> </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<?= $this->endSection() ?>