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
                <select name="pilih_semester" class="form-control pr-xl-5 pilih_semester" id="pilih_semester">
                  <option value="">Pilih Semester</option>
                  <option value="Ganjil">Ganjil</option>
                  <option value="Genap">Genap</option>
                </select>
                <select name="pilih_tahun" class="form-control mx-2 pr-xl-5 pilih_tahun" id="pilih_tahun">
                  <option value="">Pilih Tahun Ajaran</option>
                  <option value="2022/2023">2022/2023</option>
                </select>
                <select name="pilih_siswa" class="form-control pr-xl-5 pilih_siswa" id="pilih_siswa">
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswa as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>"><?= $s->Nama; ?></option>
                  <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-primary ml-2">Pilih</button>
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
              <table class="table table-bordered table-responsive-sm">
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
                    <?php if ($r->Jenis_Nilai == 'Pengetahuan') { ?>
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
              <table class="table table-bordered table-responsive-sm">
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
                    <?php if ($r->Jenis_Nilai == 'Keterampilan') { ?>
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
            <table class="table table-bordered table-responsive-sm">
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
                    <?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?>
                    <td> <?= strftime("%d %B %Y", strtotime("$r->Waktu_Mulai")); ?> - <?= strftime("%d %B %Y", strtotime("$r->Waktu_Selesai")); ?> </td>
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
            <table class="table table-bordered table-responsive-sm">
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
            <table class="table table-bordered table-responsive-sm">
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
        </div>

        <form class="" action="/rapor/printpdf" method="post">
          <?= csrf_field(); ?>
          <div class="card">
            <div class="card-body" style="padding-top: 0px; padding-bottom: 0px">
              <h4 class="card-title mb-2">Catatan untuk Perhatian Orang Tua/Wali</h4>
              <div class="form-group">
                <textarea class="form-control catatan" name="catatan" placeholder="" row="3"></textarea>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body" style="padding-top: 0px ;">
              <h4 class="card-title mb-2" id="keputusan1">Keputusan</h4>
              <div class="form-group">
                <select name="keputusan" class="form-control pr-xl-5 keputusan" id="keputusan2">
                  <option value="">Pilih Keputusan</option>
                  <option value="Naik Kelas">Naik kelas</option>
                  <option value="Tidak Naik Kelas">Tinggal di kelas</option>
                </select>
              </div>
              <?php foreach ($siswa as $s) : ?>
                <?php if ($s->Id_Siswa == session()->get('id')) { ?>
                  <input type="text" name="nama_siswa" value="<?= $s->Nama; ?>" hidden>
                <?php }; ?>
              <?php endforeach; ?>

              <?php foreach ($valid as $v) : ?>
                <?php if ($v->Id_Siswa . $v->Semester . $v->Tahun_Ajaran == session()->get('id') . session()->get('semester') . session()->get('tahun') && $v->Is_Validasi == 0) { ?>
                  
                  <button type="submit" class="btn btn-success mb-2 float-right" formtarget="_blank" hidden><i class="mdi mdi-printer" style="font-size: 15px;"></i>&nbsp;&nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;</button>
                  <button type="submit" class="btn btn-primary mb-2 float-right mr-3" formaction="/rapor/validasi" hidden><i class="mdi mdi-clipboard-text" style="font-size: 15px;"></i>&nbsp;&nbsp;&nbsp;Validasi</button>
                  <p style="color: red;" class="float-right mr-5">Status:<br>Menunggu validasi kepala sekolah</p>
                <?php }; ?>

                <?php if ($v->Id_Siswa . $v->Semester . $v->Tahun_Ajaran == session()->get('id') . session()->get('semester') . session()->get('tahun') && $v->Is_Validasi == 1) { ?>
                  <button type="submit" class="btn btn-success mb-2 float-right" formtarget="_blank"><i class="mdi mdi-printer" style="font-size: 15px;"></i>&nbsp;&nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;</button>
                  <button type="submit" class="btn btn-primary mb-2 float-right mr-3" formaction="/rapor/validasi" hidden><i class="mdi mdi-clipboard-text" style="font-size: 15px;"></i>&nbsp;&nbsp;&nbsp;Validasi</button>
                  <p style="color: green;" class="float-right mr-5">Status:<br>Sudah tervalidasi</p>
                <?php }; ?>
              <?php endforeach; ?>

              <?php $a = false;
              foreach ($valid as $v) : ?>
                <?php
                if ($v->Id_Siswa . $v->Semester . $v->Tahun_Ajaran == session()->get('id') . session()->get('semester') . session()->get('tahun')) {
                  $a = $a || true;
                }; ?>

              <?php endforeach; ?>
              <?php if (!$a) { ?>
                
                <button type="submit" class="btn btn-success mb-2 float-right" formtarget="_blank" hidden><i class="mdi mdi-printer" style="font-size: 15px;"></i>&nbsp;&nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;</button>
                <button type="submit" class="btn btn-primary mb-2 float-right mr-3" formaction="/rapor/validasi"><i class="mdi mdi-clipboard-text" style="font-size: 15px;"></i>&nbsp;&nbsp;&nbsp;Validasi</button>
                <p style="color: red;" class="float-right mr-5">Status:<br>Belum melakukan validasi nilai rapor</p>
              <?php }; ?>
            </div>
          </div>
        </form>

      <?php }; ?>

      </div>
    </div>


    <script src="<?php echo base_url(); ?>/assets/js/jquery-3.4.1.min.js"></script>

    <script>
      $('#pilih_siswa').on('change', function() {
        // Save value in localstorage
        localStorage.setItem("pilih_siswa", $(this).val());
      });
      $(document).ready(function() {
        if ($('#pilih_siswa').length) {
          $('#pilih_siswa').val(localStorage.getItem("pilih_siswa"));
        }
      });
      if (!window.location.href.includes("/get")) {
        localStorage.removeItem("pilih_siswa");
      }
    </script>

    <script>
      $('#pilih_semester').on('change', function() {
        // Save value in localstorage
        localStorage.setItem("pilih_semester", $(this).val());
      });
      $(document).ready(function() {
        if (localStorage.getItem("pilih_semester") == "Ganjil") {
          $("#keputusan1").attr("hidden", true)
          $("#keputusan2").attr("hidden", true)
        }
        if (localStorage.getItem("pilih_semester") == "Genap") {
          $("#keputusan1").removeAttr("hidden")
          $("#keputusan2").removeAttr("hidden")
        }
        if ($('#pilih_semester').length) {
          $('#pilih_semester').val(localStorage.getItem("pilih_semester"));
        }
      });
      if (!window.location.href.includes("/get")) {
        localStorage.removeItem("pilih_semester");
      }
    </script>

    <script>
      $('#pilih_tahun').on('change', function() {
        // Save value in localstorage
        localStorage.setItem("pilih_tahun", $(this).val());
      });
      $(document).ready(function() {
        if ($('#pilih_tahun').length) {
          $('#pilih_tahun').val(localStorage.getItem("pilih_tahun"));
        }
      });
      if (!window.location.href.includes("/get")) {
        localStorage.removeItem("pilih_tahun");
      }
    </script>

    <?= $this->endSection() ?>