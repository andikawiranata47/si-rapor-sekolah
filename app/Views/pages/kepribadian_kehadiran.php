<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Kepribadian & Kehadiran </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tabel Daftar Kepribadian & Kehadiran</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> NIS </th>
                  <th> Nama </th>
                  <th> Kepribadian </th>
                  <th> Sakit </th>
                  <th> Izin </th>
                  <th> Tanpa Keterangan </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kepriKeha as $k) : ?>
                <tr>
                  <td class="number"> <?= $i++; ?> </td>
                  <td> <?= $k->NIS; ?> </td>
                  <td> <?= $k->Nama; ?> </td>
                  <td> <?= $k->Kepribadian; ?> </td>
                  <td> <?= $k->Sakit; ?> </td>
                  <td> <?= $k->Izin; ?> </td>
                  <td> <?= $k->Tanpa_Keterangan; ?> </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<?= $this->endSection() ?>