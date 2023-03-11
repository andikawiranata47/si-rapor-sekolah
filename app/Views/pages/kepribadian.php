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

            <form class="form-inline" action="/kepribadian/get" method="post">
              <?= csrf_field(); ?>
              <div class="form-group my-sm-3">
                <?php foreach ($general as $g) : ?>
                  <input type="text" class="form-control pilih_semester" style="width: 85px;" name="" value="<?= $g->Semester; ?>" disabled>
                  <input type="text" class="form-control pilih_semester" name="pilih_semester" value="<?= $g->Semester; ?>" hidden>
                  <input type="text" class="form-control mx-2 pilih_tahun" style="width: 120px;" name="" value="<?= $g->Tahun_Ajaran; ?>" disabled>
                  <input type="text" class="form-control mx-2 pilih_tahun" name="pilih_tahun" value="<?= $g->Tahun_Ajaran; ?>" hidden>
                <?php endforeach; ?>

                <select name="pilih_kelas" class="form-control pr-xl-5 mr-2 pilih_kelas" id="pilih_kelas">
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Tingkat; ?>-<?= $k->Jurusan; ?>-<?= $k->Abjad; ?></option>
                  <?php endforeach; ?>
                </select>
              </div><button type="submit" class="btn btn-primary mb-2">Pilih</button>
            </form><br>

            <?php if ($id != null && $psemester != null && $ptahun != null) { ?>
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
                    <th> Kepribadian </th>
                    <th> Sakit </th>
                    <th> Izin </th>
                    <th> Tanpa Keterangan </th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($kepribadian as $k) : ?>
                    <tr>
                      <td class="number"> <?= $i++; ?> </td>
                      <td> <?= $k->Nama; ?> </td>
                      <td> <?= $k->Kepribadian; ?> </td>
                      <td> <?= $k->Sakit; ?> </td>
                      <td> <?= $k->Izin; ?> </td>
                      <td> <?= $k->Tanpa_Keterangan; ?> </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_kepribadian="<?= $k->Id_Kepribadian; ?>" data-kelas="<?= $k->Id_Kelas; ?>" data-id_siswa="<?= $k->Id_Siswa; ?>" data-semester="<?= $k->Semester; ?>" data-tahun_ajaran="<?= $k->Tahun_Ajaran; ?>" data-kepribadian="<?= $k->Kepribadian; ?>" data-sakit="<?= $k->Sakit; ?>" data-izin="<?= $k->Izin; ?>" data-tanpa_keterangan="<?= $k->Tanpa_Keterangan; ?>">Edit</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  <?php foreach ($siswaKelas as $s) : ?>
                    <?php $a = false ?>
                    <?php foreach ($kepribadian as $k) : ?>
                      <?php if ($s->Id_Siswa === $k->Id_Siswa) {
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
    <form action="/kepribadian/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Kepribadian & Kehadiran</h5>
            </div>
            <div class="modal-body">
              <div>
                <input type="text" class="form-control " name="pilih_kelas" value="<?= $id; ?>" hidden>
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
                <label>Kepribadian</label>
                <textarea id="" class="form-control" name="kepribadian" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label>Sakit</label>
                <input type="number" class="form-control " name="sakit" required>
              </div>
              <div class="form-group">
                <label>Izin</label>
                <input type="number" class="form-control " name="izin" required>
              </div>
              <div class="form-group">
                <label>Tanpa Keterangan</label>
                <input type="number" class="form-control " name="tanpa_keterangan" required>
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
    <form action="/kepribadian/edit" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Edit Kepribadian & Kehadiran</h5>
            </div>
            <div class="modal-body">
              <div>
                <input type="text" class="form-control " name="pilih_kelas" value="<?= $id; ?>" hidden>
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
                <label>Kepribadian</label>
                <textarea id="" class="form-control kepribadian" name="kepribadian" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label>Sakit</label>
                <input type="number" class="form-control sakit" name="sakit" required>
              </div>
              <div class="form-group">
                <label>Izin</label>
                <input type="number" class="form-control izin" name="izin" required>
              </div>
              <div class="form-group">
                <label>Tanpa Keterangan</label>
                <input type="number" class="form-control tanpa_keterangan" name="tanpa_keterangan" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_kepribadian" class="id_kepribadian">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

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
          const id = $(this).data('id_kepribadian');
          const siswa = $(this).data('id_siswa');
          const kelas = $(this).data('kelas');
          const kepribadian = $(this).data('kepribadian');
          const sakit = $(this).data('sakit');
          const izin = $(this).data('izin');
          const ta = $(this).data('tanpa_keterangan');

          // const akhir = $(this).data('akhir');
          // Set data to Form Edit
          $('.id_kepribadian').val(id);
          $('.siswa').val(siswa);
          $('.kelas').val(kelas);
          $('.kepribadian').val(kepribadian);
          $('.sakit').val(sakit);
          $('.izin').val(izin);
          $('.tanpa_keterangan').val(ta);

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
    </script>

    <?= $this->endSection() ?>