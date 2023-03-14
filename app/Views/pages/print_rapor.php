<style>
  table,
  td,
  th {
    border: 1px solid black;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  td,
  th {
    padding: 5px;
  }

  .number {
    text-align: center;
  }

  .nilai {
    text-align: center;
  }
</style>

<div style="page-break-after: always">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card d-block">
      <table class="table table-borderless mb-4 p-5" style="border: none; padding:3px;">
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($raporMapel as $r) : ?>
            <tr>
              <?php foreach ($general as $g) : ?>
                <th style="width: 155px; text-align:left; border: none; padding:3px;"> Nama Sekolah </th>
                <td style="width: 7px; border: none; padding:3px;">:</td>
                <td style="width: 230px; display:block; word-wrap:break-word; border: none; padding:3px;"> <?= $g->Nama_Sekolah; ?> </td>
              <?php endforeach; ?>

              <th style="width: 125px; text-align:left; border: none; padding:3px;"> Nomor Induk </th>
              <td style="width: 7px; border: none; padding:3px;">:</td>
              <td style="width: 200px; border: none; padding:3px;"> <?= $r->NIS; ?> / <?= $r->NISN; ?> </td>
            </tr>
            <tr>
              <th style="text-align:left; border: none; padding:3px;"> Nama Peserta Didik </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?= $r->Nama; ?> </td>

              <th style="text-align:left; border: none; padding:3px;"> Kelas/Semester </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?= $r->Tingkat; ?>-<?= $r->Jurusan; ?>-<?= $r->Abjad; ?> / <?= $r->Semester; ?></td>
            </tr>
            <tr>
              <th style="text-align:left; border: none; padding:3px;"> Bidang Keahlian </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?php jurusan($r->Jurusan); ?> </td>

              <th style="text-align:left; border: none; padding:3px;"> Tahun Pelajaran </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?= $r->Tahun_Ajaran; ?> </td>
            </tr>
          <?php break;
          endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card d-block">
      <h4 style="margin: 20px 0 5px 5px;">1. PENGETAHUAN</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="padding: 10px 5px; width:25px"> No </th>
            <th style="width:230px;"> Mata Pelajaran </th>
            <th style="width:50px"> KKM </th>
            <th style="width:50px"> Angka </th>
            <th style="width:auto"> Huruf </th>
            <th style="width:100px"> Predikat </th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <tr>
            <th style="text-align:left;" colspan="6">Normatif</th>
          </tr>
          <?php foreach ($raporMapel as $r) : ?>
            <?php if ($r->Jenis_Nilai == 'Pengetahuan' && $r->Kelompok == 'A') { ?>
              <tr>
                <td class="number"> <?= $i++; ?> </td>
                <td> <?= $r->Mata_Pelajaran; ?> </td>
                <td class="nilai"> <?= $r->KKM; ?> </td>
                <td class="nilai"> <?= $r->Nilai_Akhir; ?> </td>
                <td class="nilai"> <?php terbilang($r->Nilai_Akhir); ?> </td>
                <td class="nilai"> <?php predikat($r->Nilai_Akhir) ?> </td>
              </tr>
            <?php }; ?>
          <?php endforeach; ?>
          <?php $i = 1; ?>
          <tr>
            <th style="text-align:left;" colspan="6">Adaptif</th>
          </tr>
          <?php foreach ($raporMapel as $r) : ?>
            <?php if ($r->Jenis_Nilai == 'Pengetahuan' && $r->Kelompok == 'B') { ?>
              <tr>
                <td class="number"> <?= $i++; ?> </td>
                <td> <?= $r->Mata_Pelajaran; ?> </td>
                <td class="nilai"> <?= $r->KKM; ?> </td>
                <td class="nilai"> <?= $r->Nilai_Akhir; ?> </td>
                <td class="nilai"> <?php terbilang($r->Nilai_Akhir); ?> </td>
                <td class="nilai"> <?php predikat($r->Nilai_Akhir) ?> </td>
              </tr>
            <?php }; ?>
          <?php endforeach; ?>
          <?php $i = 1; ?>
          <tr>
            <th style="text-align:left;" colspan="6">Produktif</th>
          </tr>
          <?php foreach ($raporMapel as $r) : ?>
            <?php if ($r->Jenis_Nilai == 'Pengetahuan' && $r->Kelompok == 'C') { ?>
              <tr>
                <td class="number"> <?= $i++; ?> </td>
                <td> <?= $r->Mata_Pelajaran; ?> </td>
                <td class="nilai"> <?= $r->KKM; ?> </td>
                <td class="nilai"> <?= $r->Nilai_Akhir; ?> </td>
                <td class="nilai"> <?php terbilang($r->Nilai_Akhir); ?> </td>
                <td class="nilai"> <?php predikat2($r->Nilai_Akhir) ?> </td>
              </tr>
            <?php }; ?>
          <?php endforeach; ?>
          <?php $i = 1; ?>
          <tr>
            <th style="text-align:left;" colspan="6">Muatan Lokal</th>
          </tr>
          <?php foreach ($raporMapel as $r) : ?>
            <?php if ($r->Jenis_Nilai == 'Pengetahuan' && $r->Kelompok == 'D') { ?>
              <tr>
                <td class="number"> <?= $i++; ?> </td>
                <td> <?= $r->Mata_Pelajaran; ?> </td>
                <td class="nilai"> <?= $r->KKM; ?> </td>
                <td class="nilai"> <?= $r->Nilai_Akhir; ?> </td>
                <td class="nilai"> <?php terbilang($r->Nilai_Akhir); ?> </td>
                <td class="nilai"> <?php predikat($r->Nilai_Akhir) ?> </td>
              </tr>
            <?php }; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="row" style="page-break-after: always">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card d-block">
      <table class="table table-borderless mb-4 p-5" style="border: none; padding:3px;">
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($raporMapel as $r) : ?>
            <tr>
              <?php foreach ($general as $g) : ?>
                <th style="width: 155px; text-align:left; border: none; padding:3px;"> Nama Sekolah </th>
                <td style="width: 7px; border: none; padding:3px;">:</td>
                <td style="width: 230px; display:block; word-wrap:break-word; border: none; padding:3px;"> <?= $g->Nama_Sekolah; ?> </td>
              <?php endforeach; ?>

              <th style="width: 125px; text-align:left; border: none; padding:3px;"> Nomor Induk </th>
              <td style="width: 7px; border: none; padding:3px;">:</td>
              <td style="width: 200px; border: none; padding:3px;"> <?= $r->NIS; ?> / <?= $r->NISN; ?> </td>
            </tr>
            <tr>
              <th style="text-align:left; border: none; padding:3px;"> Nama Peserta Didik </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?= $r->Nama; ?> </td>

              <th style="text-align:left; border: none; padding:3px;"> Kelas/Semester </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?= $r->Tingkat; ?>-<?= $r->Jurusan; ?>-<?= $r->Abjad; ?> / <?= $r->Semester; ?></td>
            </tr>
            <tr>
              <th style="text-align:left; border: none; padding:3px;"> Bidang Keahlian </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?php jurusan($r->Jurusan); ?> </td>

              <th style="text-align:left; border: none; padding:3px;"> Tahun Pelajaran </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?= $r->Tahun_Ajaran; ?> </td>
            </tr>
          <?php break;
          endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-lg-12 grid-margin stretch-card d-block">
    <h4 style="margin: 20px 0 5px 5px;">2. KETERAMPILAN</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="padding: 10px 5px; width:25px"> No </th>
          <th style="width:230px;"> Mata Pelajaran </th>
          <th style="width:50px"> KKM </th>
          <th style="width:50px"> Angka </th>
          <th style="width:auto"> Huruf </th>
          <th style="width:100px"> Predikat </th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <tr>
          <th style="text-align:left;" colspan="6">Normatif</th>
        </tr>
        <?php foreach ($raporMapel as $r) : ?>
          <?php if ($r->Jenis_Nilai == 'Keterampilan' && $r->Kelompok == 'A') { ?>
            <tr>
              <td class="number"> <?= $i++; ?> </td>
              <td> <?= $r->Mata_Pelajaran; ?> </td>
              <td class="nilai"> <?= $r->KKM; ?> </td>
              <td class="nilai"> <?= $r->Nilai_Akhir; ?> </td>
              <td class="nilai"> <?php terbilang($r->Nilai_Akhir); ?> </td>
              <td class="nilai"> <?php predikat($r->Nilai_Akhir) ?> </td>
            </tr>
          <?php }; ?>
        <?php endforeach; ?>
        <?php $i = 1; ?>
        <tr>
          <th style="text-align:left;" colspan="6">Adaptif</th>
        </tr>
        <?php foreach ($raporMapel as $r) : ?>
          <?php if ($r->Jenis_Nilai == 'Keterampilan' && $r->Kelompok == 'B') { ?>
            <tr>
              <td class="number"> <?= $i++; ?> </td>
              <td> <?= $r->Mata_Pelajaran; ?> </td>
              <td class="nilai"> <?= $r->KKM; ?> </td>
              <td class="nilai"> <?= $r->Nilai_Akhir; ?> </td>
              <td class="nilai"> <?php terbilang($r->Nilai_Akhir); ?> </td>
              <td class="nilai"> <?php predikat($r->Nilai_Akhir) ?> </td>
            </tr>
          <?php }; ?>
        <?php endforeach; ?>
        <?php $i = 1; ?>
        <tr>
          <th style="text-align:left;" colspan="6">Produktif</th>
        </tr>
        <?php foreach ($raporMapel as $r) : ?>
          <?php if ($r->Jenis_Nilai == 'Keterampilan' && $r->Kelompok == 'C') { ?>
            <tr>
              <td class="number"> <?= $i++; ?> </td>
              <td> <?= $r->Mata_Pelajaran; ?> </td>
              <td class="nilai"> <?= $r->KKM; ?> </td>
              <td class="nilai"> <?= $r->Nilai_Akhir; ?> </td>
              <td class="nilai"> <?php terbilang($r->Nilai_Akhir); ?> </td>
              <td class="nilai"> <?php predikat2($r->Nilai_Akhir) ?> </td>
            </tr>
          <?php }; ?>
        <?php endforeach; ?>
        <?php $i = 1; ?>
        <tr>
          <th style="text-align:left;" colspan="6">Muatan Lokal</th>
        </tr>
        <?php foreach ($raporMapel as $r) : ?>
          <?php if ($r->Jenis_Nilai == 'Keterampilan' && $r->Kelompok == 'D') { ?>
            <tr>
              <td class="number"> <?= $i++; ?> </td>
              <td> <?= $r->Mata_Pelajaran; ?> </td>
              <td class="nilai"> <?= $r->KKM; ?> </td>
              <td class="nilai"> <?= $r->Nilai_Akhir; ?> </td>
              <td class="nilai"> <?php terbilang($r->Nilai_Akhir); ?> </td>
              <td class="nilai"> <?php predikat($r->Nilai_Akhir) ?> </td>
            </tr>
          <?php }; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card d-block">
      <table class="table table-borderless mb-4 p-5" style="border: none; padding:3px;">
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($raporMapel as $r) : ?>
            <tr>
              <?php foreach ($general as $g) : ?>
                <th style="width: 155px; text-align:left; border: none; padding:3px;"> Nama Sekolah </th>
                <td style="width: 7px; border: none; padding:3px;">:</td>
                <td style="width: 230px; display:block; word-wrap:break-word; border: none; padding:3px;"> <?= $g->Nama_Sekolah; ?> </td>
              <?php endforeach; ?>

              <th style="width: 125px; text-align:left; border: none; padding:3px;"> Nomor Induk </th>
              <td style="width: 7px; border: none; padding:3px;">:</td>
              <td style="width: 200px; border: none; padding:3px;"> <?= $r->NIS; ?> / <?= $r->NISN; ?> </td>
            </tr>
            <tr>
              <th style="text-align:left; border: none; padding:3px;"> Nama Peserta Didik </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?= $r->Nama; ?> </td>

              <th style="text-align:left; border: none; padding:3px;"> Kelas/Semester </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?= $r->Tingkat; ?>-<?= $r->Jurusan; ?>-<?= $r->Abjad; ?> / <?= $r->Semester; ?></td>
            </tr>
            <tr>
              <th style="text-align:left; border: none; padding:3px;"> Bidang Keahlian </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?php jurusan($r->Jurusan); ?> </td>

              <th style="text-align:left; border: none; padding:3px;"> Tahun Pelajaran </th>
              <td style="border: none; padding:3px;">:</td>
              <td style="border: none; padding:3px;"> <?= $r->Tahun_Ajaran; ?> </td>
            </tr>
          <?php break;
          endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-lg-12 grid-margin stretch-card d-block">
    <h4 style="margin: 20px 0 5px 5px;">3. PRAKTIK KERJA INDUSTRI DAN/ATAU INSTANSI RELEVAN</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="padding: 10px 5px; width:25px"> No </th>
          <th style="width:140px;"> Nama Instansi </th>
          <th style="width:auto"> Alamat Instansi </th>
          <th style="width:120px"> Lama Waktu<br>Pelaksanaan </th>
          <th style="width:50px"> Nilai </th>
          <th style="width:100px"> Predikat </th>
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
            <td class="nilai"> <?= strftime("%d %B %Y", strtotime("$r->Waktu_Mulai")); ?> -<br><?= strftime("%d %B %Y", strtotime("$r->Waktu_Selesai")); ?> </td>
            <td class="nilai"> <?= $r->Nilai_Prakerin; ?> </td>
            <td class="nilai"> <?php predikat($r->Nilai_Prakerin) ?> </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="col-lg-12 grid-margin stretch-card d-block">
    <h4 style="margin: 20px 0 5px 5px;">4. EKSTRAKURIKULER</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="padding: 10px 5px; width:25px"> No </th>
          <th style="width:auto;"> Nama Ekstrakurikuler </th>
          <th style="width:200px"> Predikat </th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($raporEkstra as $r) : ?>
          <tr>
            <td class="number"> <?= $i++; ?> </td>
            <td> <?= $r->Nama_Ekstrakurikuler; ?> </td>
            <td class="nilai"> <?= $r->Predikat; ?> </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="col-lg-12 grid-margin stretch-card d-block">
    <h4 style="margin: 20px 0 5px 5px;">5. KEPRIBADIAN DAN KETIDAKHADIRAN</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width:auto;"> Kepribadian </th>
          <th style="width:200px" colspan="3"> Ketidakhadiran </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php foreach ($raporKepribadian as $r) : ?>
            <td rowspan="2"> <?= $r->Kepribadian; ?> </td>
          <?php endforeach; ?>
          <td class="nilai" style="width:70px">Sakit</td>
          <td class="nilai" style="width:70px">Izin</td>
          <td class="nilai" style="width:120px">Tanpa Keterangan</td>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($raporKepribadian as $r) : ?>
          <tr>
            <td class="nilai"> <?= $r->Sakit; ?> </td>
            <td class="nilai"> <?= $r->Izin; ?> </td>
            <td class="nilai"> <?= $r->Tanpa_Keterangan; ?> </td>
          </tr>
        <?php endforeach; ?>
        <?php $i = 1; ?>
      </tbody>
    </table>
  </div>
  <div class="col-lg-12 grid-margin stretch-card d-block">
    <h4 style="margin: 20px 0 5px 5px;">6. CATATAN UNTUK PERHATIAN ORANG TUA/WALI</h4>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td style="height: 30px;"><?= $catatan; ?></td>
        </tr>
      </tbody>
    </table>
  </div>

  <?php if (session()->get('semester') == 'Genap') { ?>
    <div class="col-lg-12 grid-margin stretch-card d-block">
      <h4 style="margin: 20px 0 5px 5px;">7. KEPUTUSAN KENAIKAN</h4>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td style="height: 30px;">Dengan ini siswa bersangkutan dinyatakan: <b><?= $keputusan; ?></b></td>
          </tr>
        </tbody>
      </table>
    </div>
  <?php }; ?>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card d-block">
      <table class="table table-borderless mb-4 p-5" style="border: none; padding:2px 5px; margin-top:30px;">
        <tbody>
          <tr>
            <td style="border: none; width:33%;"></td>
            <td style="border: none; width:34%;"></td>
            <td style="text-align:left; border: none; padding:2px 5px; width:33%;">Pare, </td>
          </tr>
          <tr>
            <th style="text-align:left; border: none; padding:2px 5px;"> Mengetahui </th>
            <td style="border: none;"></td>
            <th style="text-align:left; border: none; padding:2px 5px;"> Mengetahui </th>
          </tr>
          <tr>
            <th style="text-align:left; border: none; padding:2px 5px;"> Orang Tua/Wali </th>
            <td style="border: none;"></td>
            <th style="text-align:left; border: none; padding:2px 5px;"> Wali Kelas </th>
          </tr>
          <tr>
            <td style="border: none; height:60px;"></td>
          </tr>
          <tr>
            <td style="text-align:left; border: none; padding:2px 5px;"> ......................... </td>
            <td style="border: none;"></td>
            <?php foreach ($user as $u) : ?>
              <?php if ($u->Id_User == session()->get('wali_kelas')) { ?>
                <th style="text-align:left; border: none; padding:2px 5px;"> <?= $u->Nama; ?> </th>
              <?php }; ?>
            <?php endforeach; ?>

          </tr>
          <tr>
            <th style="border: none;"></th>
            <td style="border: none;"></td>
            <?php foreach ($user as $u) : ?>
              <?php if ($u->Id_User == session()->get('wali_kelas')) { ?>
                <td style="text-align:left; border: none; padding:2px 5px;"> NIP. <?= $u->NIP; ?> </td>
              <?php }; ?>
            <?php endforeach; ?>
          </tr>
          <tr>
            <td style="border: none;"></td>
            <th style="text-align:left; border: none; padding:2px 5px;"> Mengetahui </th>
            <td style="border: none;"></td>
          </tr>
          <tr>
            <td style="border: none;"></td>
            <th style="text-align:left; border: none; padding:2px 5px;"> Kepala Sekolah </th>
            <td style="border: none;"></td>
          </tr>
          <tr>
            <td style="border: none; height:60px;"></td>
          </tr>
          <tr>
            <td style="border: none;"></td>
            <?php foreach ($general as $g) : ?>
              <th style="text-align:left; border: none; padding:2px 5px;"> <?= $g->Nama_Kepsek; ?> </th>
            <?php endforeach; ?>
            <td style="border: none;"></td>
          </tr>
          <tr>
            <td style="border: none;"></td>
            <?php foreach ($general as $g) : ?>
              <td style="text-align:left; border: none; padding:2px 5px;"> NIP. <?= $g->NIP_Kepsek; ?> </td>
            <?php endforeach; ?>
            <td style="border: none;"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>



<!-- method -->

<?php
function predikat($nilai)
{
  if ($nilai <= 59) {
    echo 'Kurang';
  }
  if ($nilai > 59 && $nilai <= 74) {
    echo 'Cukup';
  }
  if ($nilai > 74 && $nilai <= 89) {
    echo 'Baik';
  }
  if ($nilai > 89 && $nilai <= 100) {
    echo 'Sangat Baik';
  }
}

function predikat2($nilai)
{
  if ($nilai <= 69) {
    echo 'Belum Kompeten';
  }
  if ($nilai > 69 && $nilai <= 100) {
    echo 'Kompeten';
  }
}

function jurusan($jurusan)
{
  if ($jurusan == 'TKR') {
    echo 'Teknik Kendaraan Ringan';
  }
  if ($jurusan == 'ATP') {
    echo 'Agribisnis Tanaman Perkebunan';
  }
  if ($jurusan == 'TM') {
    echo 'Teknik Mesin';
  }
}

// FUNGSI TERBILANG OLEH : MALASNGODING.COM
// WEBSITE : WWW.MALASNGODING.COM
// AUTHOR : https://www.malasngoding.com/author/admin


function penyebut($nilai)
{
  $nilai = abs($nilai);
  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
  if ($nilai < 12) {
    $temp = " " . $huruf[$nilai];
  } else if ($nilai < 20) {
    $temp = penyebut($nilai - 10) . " belas";
  } else if ($nilai < 100) {
    $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
  } else if ($nilai < 200) {
    $temp = " seratus" . penyebut($nilai - 100);
  } else if ($nilai < 1000) {
    $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
  } else if ($nilai < 2000) {
    $temp = " seribu" . penyebut($nilai - 1000);
  } else if ($nilai < 1000000) {
    $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
  } else if ($nilai < 1000000000) {
    $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
    $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
  } else if ($nilai < 1000000000000000) {
    $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
  }
  return $temp;
}

function terbilang($nilai)
{
  if ($nilai < 0) {
    $hasil = "minus " . trim(penyebut($nilai));
    echo ucwords($hasil);
  } else {
    $hasil = trim(penyebut($nilai));
    echo ucwords($hasil);
  }
  return $hasil;
}
?>