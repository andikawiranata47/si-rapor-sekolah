<?= $this->include('partials/header'); ?>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card d-block">
    <table class="table table-borderless mb-4 p-5">
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($raporMapel as $r) : ?>
          <tr>
            <th style="width: 165px; text-align:left;"> Nama Peserta Didik </th>
            <td style="width: 10px;">:</td>
            <td style="width: 230px; display:block; word-wrap:break-word;"> <?= $r->Nama; ?> </td>

            <th style="width: 125px; text-align:left;"> Nomor Induk </th>
            <td style="width: 10px;">:</td>
            <td style="width: 200px;"> 12345 / 1234567890 </td>
          </tr>
          <tr>
            <th style="text-align:left;"> Bidang Keahlian </th>
            <td>:</td>
            <td> <?= $r->Jurusan; ?> </td>

            <th style="text-align:left;"> Kelas/Semester </th>
            <td>:</td>
            <td> <?= $r->Tingkat; ?> / <?= $r->Semester; ?></td>
          </tr>
          <tr>
            <th style="text-align:left;"> Tahun Ajaran </th>
            <td>:</td>
            <td> <?= $r->Tahun_Ajaran; ?> </td>
          </tr>
        <?php break;
        endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<br><br>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card d-block">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th> No </th>
          <th> Mata Pelajaran </th>
          <th> KKM </th>
          <th> Nilai </th>
          <th> Predikat </th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <tr>
          <th>Kelompok A</th>
        </tr>
        <?php foreach ($raporMapel as $r) : ?>
          <?php if ($r->Jenis_Nilai == 'Pengetahuan' && $r->Kelompok == 'A') { ?>
            <tr>
              <td class="number"> <?= $i++; ?> </td>
              <td> <?= $r->Mata_Pelajaran; ?> </td>
              <td> <?= $r->KKM; ?> </td>
              <td> <?= $r->Nilai_Akhir; ?> </td>
              <td> <?php predikat($r->Nilai_Akhir) ?> </td>
            </tr>
          <?php }; ?>
        <?php endforeach; ?>
        <?php $i = 1; ?>
        <tr>
          <th>Kelompok B</th>
        </tr>
        <?php foreach ($raporMapel as $r) : ?>
          <?php if ($r->Jenis_Nilai == 'Pengetahuan' && $r->Kelompok == 'B') { ?>
            <tr>
              <td class="number"> <?= $i++; ?> </td>
              <td> <?= $r->Mata_Pelajaran; ?> </td>
              <td> <?= $r->KKM; ?> </td>
              <td> <?= $r->Nilai_Akhir; ?> </td>
              <td> <?php predikat($r->Nilai_Akhir) ?> </td>
            </tr>
          <?php }; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<br><br>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card d-block">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th> No </th>
          <th> Mata Pelajaran </th>
          <th> KKM </th>
          <th> Nilai </th>
          <th> Predikat </th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <tr>
          <th>Kelompok A</th>
        </tr>
        <?php foreach ($raporMapel as $r) : ?>
          <?php if ($r->Jenis_Nilai == 'Keterampilan' && $r->Kelompok == 'A') { ?>
            <tr>
              <td class="number"> <?= $i++; ?> </td>
              <td> <?= $r->Mata_Pelajaran; ?> </td>
              <td> <?= $r->KKM; ?> </td>
              <td> <?= $r->Nilai_Akhir; ?> </td>
              <td> <?php predikat($r->Nilai_Akhir) ?> </td>
            </tr>
          <?php }; ?>
        <?php endforeach; ?>
        <?php $i = 1; ?>
        <tr>
          <th>Kelompok B</th>
        </tr>
        <?php foreach ($raporMapel as $r) : ?>
          <?php if ($r->Jenis_Nilai == 'Keterampilan' && $r->Kelompok == 'B') { ?>
            <tr>
              <td class="number"> <?= $i++; ?> </td>
              <td> <?= $r->Mata_Pelajaran; ?> </td>
              <td> <?= $r->KKM; ?> </td>
              <td> <?= $r->Nilai_Akhir; ?> </td>
              <td> <?php predikat($r->Nilai_Akhir) ?> </td>
            </tr>
          <?php }; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
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
?>