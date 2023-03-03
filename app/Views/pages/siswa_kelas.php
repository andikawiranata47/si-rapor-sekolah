<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Siswa Kelas</h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-inline">Tabel Daftar Siswa Kelas</h4>

            <form class="form-inline" action="/SiswaKelas/get" method="post">
              <?= csrf_field(); ?>
              <div class="form-group mr-4 my-sm-3">
                <select name="pilih_kelas" class="form-control pr-xl-5 pilih_kelas" id="pilih_kelas">
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Kelas; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary mb-2">Pilih</button>
            </form>

            <?php if ($id != null) { ?>
              <div class="float-right">
                <?php if (session()->getFlashdata('pesan')) : ?>
                  <p class="card-description mr-3 text-success d-inline">
                    <?= session()->getFlashdata('pesan'); ?>
                  </p>
                <?php endif; ?>
                <button type="button" class="btn btn-success mb-2 btn-add" data-toggle="modal" data-target="#addModal" data-id_kelas="<?= $id; ?>">Tambah</button>
              </div>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Kelas </th>
                    <th> NIS </th>
                    <th> Nama </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($siswaKelas as $s) : ?>
                    <tr>
                      <td class="number"> <?= $i++; ?> </td>
                      <td> <?= $s->Kelas; ?> </td>
                      <td> <?= $s->NIS; ?> </td>
                      <td> <?= $s->Nama; ?> </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_siswa="<?= $s->Id_Siswa; ?>" data-id_kelas="<?= $s->Id_Kelas; ?>">Edit</button>
                        <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal" data-id_siswa="<?= $s->Id_Siswa; ?>" data-id_kelas="<?= $s->Id_Kelas; ?>">Hapus</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php }; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Tambah -->
    <form action="/SiswaKelas/edit" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Siswa</h5>
            </div>
            <div class="modal-body">
              <select name="kelas" class="form-control kelas" hidden>
                <option value="">Pilih Kelas</option>
                <?php foreach ($kelas as $k) : ?>
                  <option value="<?= $k->Id_Kelas; ?>"><?= $k->Kelas; ?></option>
                <?php endforeach; ?>
              </select>
              <div class="form-group">
                <label>Siswa</label><br>
                <label>* Kelas siswa saat ini -- Nama -- NIS</label><br>
                <label>* Nama -- NIS</label>
                <select name="siswa" class="form-control" required>
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswaKelas1 as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>">
                      <?php if ($s->Kelas != null) { ?>
                        <?= $s->Kelas; ?>&nbsp;&nbsp;&nbsp;-- <?= $s->Nama; ?> -- <?= $s->NIS; ?>
                      <?php } else { ?>
                        <?= $s->Nama; ?> -- <?= $s->NIS; ?>
                      <?php }; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <!-- <input type="hidden" name="id_siswa" class="id_siswa1"> -->
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Tambah -->

    <!-- Modal Edit -->
    <form action="/SiswaKelas/edit/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Edit User</h5>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <label>Kelas</label>
                <select name="kelas" class="form-control kelas" required>
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Kelas; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <!-- <label>Kelas lama</label> -->
                <select name="kelas_lama" class="form-control kelas_lama" hidden>
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Kelas; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <!-- <label>Siswa</label> -->
                <select name="siswa" class="form-control siswa" hidden>
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswa as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>"><?= $s->Nama; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <!-- <input type="hidden" name="id_siswa" class="id_siswa1"> -->
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/SiswaKelas/delete/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_siswa" class="id_siswa2">
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
          const kelas = $(this).data('id_kelas');
          // Set data to Form Edit
          $('.kelas').val(kelas);
          // Call Modal Edit
          $('#addModal').modal('show');
        });
      });

      $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
          // get data from button edit
          const siswa = $(this).data('id_siswa');
          const kelas = $(this).data('id_kelas');
          const kelas_lama = $(this).data('id_kelas');
          // const nama = $(this).data('nama');
          // Set data to Form Edit
          $('.siswa').val(siswa);
          $('.kelas').val(kelas);
          $('.kelas_lama').val(kelas_lama);
          // $('.nama').val(nama).trigger('change');
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const siswa = $(this).data('id_siswa');
          const kelas = $(this).data('id_kelas');
          // Set data to Form Edit
          $('.siswa').val(siswa);
          $('.kelas').val(kelas);
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