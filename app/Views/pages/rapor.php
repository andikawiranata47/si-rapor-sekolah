<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Rapor </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card d-block">
        <div class="card">
          <div class="card-body">

            <form class="form-inline" action="/rapor/get" method="post">
              <?= csrf_field(); ?>
              <div class="form-group mr-4 mb-4">
                <select name="pilih_siswa" class="form-control pr-xl-5 pilih_siswa" id="pilih_siswa">
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswa as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>"><?= $s->Nama; ?></option>
                  <?php endforeach; ?>
                </select> <button type="submit" class="btn btn-primary ml-2">Pilih</button>
              </div>
            </form>

            <?php if ($id != null) { ?>
              <table class="table table-borderless mb-4">
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($raporMapel as $r) : ?>
                    <tr>
                      <th style="width: 200px;"> Nama </th>
                      <td style="width: 30px;">:</td>
                      <td> <?= $r->Nama; ?> </td>
                    </tr>
                    <tr>
                      <th> Kelas </th>
                      <td>:</td>
                      <td> <?= $r->Tingkat; ?>-<?= $r->Jurusan; ?>-<?= $r->Abjad; ?> </td>
                    </tr>
                    <tr>
                      <th> Semester </th>
                      <td>:</td>
                      <td> <?= $r->Semester; ?> </td>
                    </tr>
                    <tr>
                      <th> Tahun Ajaran </th>
                      <td>:</td>
                      <td> <?= $r->Tahun_Ajaran; ?> </td>
                    </tr>

                  <?php break;
                  endforeach; ?>
                </tbody>
              </table>

              <div class="float-right">
                <?php if (session()->getFlashdata('pesan')) : ?>
                  <p class="card-description mr-3 text-success d-inline">
                    <?= session()->getFlashdata('pesan'); ?>
                  </p>
                <?php endif; ?>
              </div>
              <h4 class="card-title mb-2">Tabel Daftar Nilai Mata Pelajaran: Pengetahuan</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Mata Pelajaran </th>
                    <th> Jenis Nilai </th>
                    <th> Kelompok </th>
                    <th> Nilai </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($raporMapel as $r) : ?>
                    <?php if($r->Jenis_Nilai == 'Pengetahuan') { ?>
                    <tr>
                      <td class="number"> <?= $i++; ?> </td>
                      <td> <?= $r->Mata_Pelajaran; ?> </td>
                      <td> <?= $r->Jenis_Nilai; ?> </td>
                      <td> <?= $r->Kelompok; ?> </td>
                      <td> <?= $r->Nilai_Akhir; ?> </td>
                    </tr>
                    <?php }; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>

              <h4 class="card-title mb-2 mt-4">Tabel Daftar Nilai Mata Pelajaran: Keterampilan</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Mata Pelajaran </th>
                    <th> Jenis Nilai </th>
                    <th> Kelompok </th>
                    <th> Nilai </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($raporMapel as $r) : ?>
                    <?php if($r->Jenis_Nilai == 'Keterampilan') { ?>
                    <tr>
                      <td class="number"> <?= $i++; ?> </td>
                      <td> <?= $r->Mata_Pelajaran; ?> </td>
                      <td> <?= $r->Jenis_Nilai; ?> </td>
                      <td> <?= $r->Kelompok; ?> </td>
                      <td> <?= $r->Nilai_Akhir; ?> </td>
                    </tr>
                    <?php }; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
          </div>
        </div>

        <div class="card">
          <div class="card-body" style="padding-top: 0px ;">
            <h4 class="card-title mb-2">Tabel Daftar Nilai Prakerin</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Nama Instansi </th>
                  <th> Alamat Instansi </th>
                  <th> Waktu Pelaksanaan </th>
                  <th> Nilai Prakerin </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($raporPrakerin as $r) : ?>
                  <tr>
                    <td class="number"> <?= $i++; ?> </td>
                    <td> <?= $r->Nama_Instansi; ?> </td>
                    <td> <?= $r->Alamat_Instansi; ?> </td>
                    <td> <?= date('d F Y', strtotime("$r->Waktu_Mulai")); ?> - <?= date('d F Y', strtotime("$r->Waktu_Selesai")); ?> </td>
                    <td> <?= $r->Nilai_Prakerin; ?> </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card">
          <div class="card-body" style="padding-top: 0px ;">
            <h4 class="card-title mb-2">Tabel Daftar Nilai Ekstrakurikuler</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Nama Ekstrakurikuler </th>
                  <th> Predikat </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($raporEkstra as $r) : ?>
                  <tr>
                    <td class="number"> <?= $i++; ?> </td>
                    <td> <?= $r->Nama_Ekstrakurikuler; ?> </td>
                    <td> <?= $r->Predikat; ?> </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card">
          <div class="card-body" style="padding-top: 0px ;">
            <h4 class="card-title mb-2">Tabel Daftar Nilai Kepribadian & Ketidakhadiran</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Sakit </th>
                  <th> Izin </th>
                  <th> Tanpa Keterangan </th>
                  <th> Kepribadian </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($raporKepribadian as $r) : ?>
                  <tr>
                    <td class="number"> <?= $i++; ?> </td>
                    <td> <?= $r->Sakit; ?> </td>
                    <td> <?= $r->Izin; ?> </td>
                    <td> <?= $r->Tanpa_Keterangan; ?> </td>
                    <td> <?= $r->Kepribadian; ?> </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div><?php }; ?>

      </div>
    </div>


    <script src="<?php echo base_url(); ?>/assets/js/jquery-3.4.1.min.js"></script>


    <?= $this->endSection() ?>