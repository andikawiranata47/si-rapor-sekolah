<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Nilai Mata Pelajaran </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-inline">Tabel Daftar Nilai Mata Pelajaran</h4>

            <form class="form-inline" action="/NilaiMataPelajaran/get" method="post">
              <?= csrf_field(); ?>
              <div class="form-group my-sm-3">
                <?php foreach ($general as $g) : ?>
                  <input type="text" class="form-control pilih_semester" style="width: 85px;" name="" value="<?= $g->Semester; ?>" disabled>
                  <input type="text" class="form-control pilih_semester" name="pilih_semester" value="<?= $g->Semester; ?>" hidden>
                  <input type="text" class="form-control mx-2 pilih_tahun" style="width: 120px;" name="" value="<?= $g->Tahun_Ajaran; ?>" disabled>
                  <input type="text" class="form-control mx-2 pilih_tahun" name="pilih_tahun" value="<?= $g->Tahun_Ajaran; ?>" hidden>
                <?php endforeach; ?>

                <select name="pilih_kelas" class="form-control pr-xl-5 pilih_kelas" id="pilih_kelas">
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Kelas; ?></option>
                  <?php endforeach; ?>
                </select>
                <select name="pilih_mapel" class="form-control pr-xl-5 mx-2 pilih_mapel" id="pilih_mapel">
                  <option value="">Pilih Mata Pelajaran</option>
                  <?php foreach ($mapel as $m) : ?>
                    <option value="<?= $m->Id_Mata_Pelajaran; ?>"><?= $m->Mata_Pelajaran; ?></option>
                  <?php endforeach; ?>
                </select>
                <select name="pilih_jenis" class="form-control mr-2 pr-xl-5 pilih_jenis" id="pilih_jenis">
                  <option value="">Pilih Jenis Nilai</option>
                  <option value="Pengetahuan">Pengetahuan</option>
                  <option value="Keterampilan">Keterampilan</option>
                </select>
              </div><button type="submit" class="btn btn-primary mb-2">Pilih</button>
            </form><br>

            <?php if ($id != null && $pmapel != null && $pjenis != null && $psemester != null && $ptahun != null) { ?>
              <div class="float-right">
                <?php if (session()->getFlashdata('pesan')) : ?>
                  <p class="card-description mr-3 text-success d-inline">
                    <?= session()->getFlashdata('pesan'); ?>
                  </p>
                <?php endif; ?>

              </div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nama </th>
                    <th> Mata Pelajaran </th>
                    <th> Jenis Nilai </th>
                    <th> Nilai UH </th>
                    <th> Nilai UTS </th>
                    <th> Nilai UAS </th>
                    <th> Nilai Akhir </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($nilaiMapel as $n) : ?>

                    <?php //echo $i . ' dari ' . count($siswaKelas) . ' siswa'; 
                    ?>

                    <tr>
                      <td class="number"> <?= $i++; ?> </td>
                      <td> <?= $n->Nama; ?> </td>
                      <td> <?= $n->Mata_Pelajaran; ?> </td>
                      <td> <?= $n->Jenis_Nilai; ?> </td>
                      <td> <?= $n->Nilai_UH; ?> </td>
                      <td> <?= $n->Nilai_UTS; ?> </td>
                      <td> <?= $n->Nilai_UAS; ?> </td>
                      <td> <?= $n->Nilai_Akhir; ?> </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_nilaimapel="<?= $n->Id_Nilai_Mata_Pelajaran; ?>" data-kelas="<?= $n->Id_Kelas; ?>" data-id_siswa="<?= $n->Id_Siswa; ?>" data-id_mapel="<?= $n->Id_Mata_Pelajaran; ?>" data-jenis_nilai="<?= $n->Jenis_Nilai; ?>" data-semester="<?= $n->Semester; ?>" data-tahun_ajaran="<?= $n->Tahun_Ajaran; ?>" data-nilai_uh="<?= $n->Nilai_UH; ?>" data-nilai_uts="<?= $n->Nilai_UTS; ?>" data-nilai_uas="<?= $n->Nilai_UAS; ?>" data-nilai_akhir="<?= $n->Nilai_Akhir; ?>">Edit</button>

                      </td>
                    </tr>
                  <?php endforeach; ?>
                  <?php foreach ($siswaKelas as $s) : ?>
                    <?php $a = false ?>
                    <?php foreach ($nilaiMapel as $n) : ?>
                      <?php if ($s->Id_Siswa === $n->Id_Siswa) {
                        $a = $a || true;
                      }; ?>
                    <?php endforeach; ?>
                    <?php if (!$a) { ?>
                      <tr>
                        <td class="number"> <?= $i++; ?> </td>
                        <td><?= $s->Nama; ?></td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> <button type="button" class="btn btn-inverse-success  mb-2 btn-add" data-toggle="modal" data-target="#addModal" data-siswa="<?= $s->Id_Siswa; ?>" data-kelas="<?= $s->Id_Kelas; ?>">Tambah</button> </td>
                      </tr>
                    <?php }; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php }; ?>

          </div>
        </div>
      </div>
    </div>

    <!-- Modal Tambah -->
    <form action="/NilaiMataPelajaran/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Nilai Mata Pelajaran</h5>
            </div>
            <div class="modal-body">
              <div>
                <input type="text" class="form-control " name="pilih_kelas" value="<?= $id; ?>" hidden>
                <input type="text" class="form-control " name="pilih_mapel" value="<?= $pmapel; ?>" hidden>
                <input type="text" class="form-control " name="pilih_jenis" value="<?= $pjenis; ?>" hidden>
                <input type="text" class="form-control " name="pilih_semester" value="<?= $psemester; ?>" hidden>
                <input type="text" class="form-control " name="pilih_tahun" value="<?= $ptahun; ?>" hidden>
              </div>
              <div class="form-group">
                <label>Siswa</label>
                <select name="siswa" class="form-control pr-xl-5 siswa" id="siswa" disabled>
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswaKelas as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>"><?= $s->Nama; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="">
                <!-- <label>Siswa</label> -->
                <select name="siswa" class="form-control pr-xl-5 siswa" id="siswa" hidden>
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswaKelas as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>"><?= $s->Nama; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nilai UH</label>
                <input type="text" class="form-control " name="uh" required>
              </div>
              <div class="form-group">
                <label>Nilai UTS</label>
                <input type="text" class="form-control " name="uts" required>
              </div>
              <div class="form-group">
                <label>Nilai UAS</label>
                <input type="text" class="form-control " name="uas" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="kelas" class="kelas">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Tambah -->

    <!-- Modal Edit -->
    <form action="/NilaiMataPelajaran/edit/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Edit Nilai Mata Pelajaran</h5>
            </div>
            <div class="modal-body">
              <div>
                <input type="text" class="form-control " name="pilih_kelas" value="<?= $id; ?>" hidden>
                <input type="text" class="form-control " name="pilih_mapel" value="<?= $pmapel; ?>" hidden>
                <input type="text" class="form-control " name="pilih_jenis" value="<?= $pjenis; ?>" hidden>
                <input type="text" class="form-control " name="pilih_semester" value="<?= $psemester; ?>" hidden>
                <input type="text" class="form-control " name="pilih_tahun" value="<?= $ptahun; ?>" hidden>
              </div>
              <div class="form-group">
                <label>Siswa</label>
                <select name="siswa" class="form-control pr-xl-5 siswa" id="siswa" disabled>
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswaKelas as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>"><?= $s->Nama; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="">
                <!-- <label>Siswa</label> -->
                <select name="siswa" class="form-control pr-xl-5 siswa" id="siswa" hidden>
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswaKelas as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>"><?= $s->Nama; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nilai UH</label>
                <input type="text" class="form-control uh" name="uh" required>
              </div>
              <div class="form-group">
                <label>Nilai UTS</label>
                <input type="text" class="form-control uts" name="uts" required>
              </div>
              <div class="form-group">
                <label>Nilai UAS</label>
                <input type="text" class="form-control uas" name="uas" required>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="kelas" class="kelas">
                <input type="hidden" name="id_nilaimapel" class="id_nilaimapel">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/NilaiMataPelajaran/delete/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_nilaimapel" class="id_nilaimapel2">
              <button type="submit" class="btn btn-success">Ya</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Hapus -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery-3.4.1.min.js"></script>
    <script>
      $(document).ready(function() {

        // get Edit Product
        $('.btn-add').on('click', function() {
          // get data from button edit
          const siswa = $(this).data('siswa');
          const kelas = $(this).data('kelas');
          // Set data to Form Edit
          $('.siswa').val(siswa);
          $('.kelas').val(kelas);
          // Call Modal Edit
          $('#addModal').modal('show');
        });
      });

      $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_nilaimapel');
          const siswa = $(this).data('id_siswa');
          const kelas = $(this).data('kelas');
          const uh = $(this).data('nilai_uh');
          const uts = $(this).data('nilai_uts');
          const uas = $(this).data('nilai_uas');
          // const akhir = $(this).data('akhir');
          // Set data to Form Edit
          $('.id_nilaimapel').val(id);
          $('.siswa').val(siswa);
          $('.kelas').val(kelas);
          $('.uh').val(uh);
          $('.uts').val(uts);
          $('.uas').val(uas);
          // $('.akhir').val(akhir);
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_nilaimapel');
          // Set data to Form Edit
          $('.id_nilaimapel2').val(id);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <script>
      $('#pilih_kelas').on('change', function() {
        // Save value in localstorage
        localStorage.setItem("pilih_kelas", $(this).val());
      });
      $(document).ready(function() {
        if ($('#pilih_kelas').length) {
          $('#pilih_kelas').val(localStorage.getItem("pilih_kelas"));
        }
      });
      if (!window.location.href.includes("/get")) {
        localStorage.removeItem("pilih_kelas");
      }

      $('#pilih_mapel').on('change', function() {
        // Save value in localstorage
        localStorage.setItem("pilih_mapel", $(this).val());
      });
      $(document).ready(function() {
        if ($('#pilih_mapel').length) {
          $('#pilih_mapel').val(localStorage.getItem("pilih_mapel"));
        }
      });
      if (!window.location.href.includes("/get")) {
        localStorage.removeItem("pilih_mapel");
      }

      $('#pilih_jenis').on('change', function() {
        // Save value in localstorage
        localStorage.setItem("pilih_jenis", $(this).val());
      });
      $(document).ready(function() {
        if ($('#pilih_jenis').length) {
          $('#pilih_jenis').val(localStorage.getItem("pilih_jenis"));
        }
      });
      if (!window.location.href.includes("/get")) {
        localStorage.removeItem("pilih_jenis");
      }
    </script>

    <?= $this->endSection() ?>