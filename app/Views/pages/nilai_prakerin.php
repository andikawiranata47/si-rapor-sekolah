<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Nilai Prakerin </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tabel Daftar Nilai Prakerin</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> NIS </th>
                  <th> Nama </th>
                  <th> Nama Instansi </th>
                  <th> Alamat Instansi </th>
                  <th> Waktu Pelaksanaan </th>
                  <th> Nilai Prakerin </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($nilaiPrakerin as $n) : ?>
                <tr>
                  <td class="number"> <?= $i++; ?> </td>
                  <td> <?= $n->NIS; ?> </td>
                  <td> <?= $n->Nama; ?> </td>
                  <td> <?= $n->Nama_Instansi; ?> </td>
                  <td> <?= $n->Alamat_Instansi; ?> </td>
                  <td> <?= $n->Waktu_Pelaksanaan; ?> </td>
                  <td> <?= $n->Nilai_Prakerin; ?> </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<?= $this->endSection() ?>