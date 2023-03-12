<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Kelas </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-inline">Tabel Daftar Kelas</h4>
            <div class="float-right">
              <?php if (session()->getFlashdata('pesan')) : ?>
                <p class="card-description mr-3 text-success d-inline">
                  <?= session()->getFlashdata('pesan'); ?>
                </p>
              <?php endif; ?>
              <!-- <input type="hidden" name="id_kelas" class="" value="1"> -->
              <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#naikModal">Naik Kelas</button>
              <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Tambah</button>
            </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Kelas </th>
                  <th> Wali Kelas </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kelas as $k) : ?>
                  <tr>
                    <td class="number"> <?= $i++; ?> </td>
                    <td> <?= $k->Tingkat; ?>-<?= $k->Jurusan; ?>-<?= $k->Abjad; ?> </td>
                    <td> <?= $k->Nama; ?> </td>
                    <td class="text-center">
                      <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_kelas="<?= $k->Id_Kelas; ?>" data-wali_kelas="<?= $k->Wali_Kelas; ?>" data-tingkat="<?= $k->Tingkat; ?>" data-jurusan="<?= $k->Jurusan; ?>" data-abjad="<?= $k->Abjad; ?>" data-nama="<?= $k->Nama; ?>" data-id_lama="<?= $k->Id_User; ?>">Edit</button>
                      <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal" data-id_kelas="<?= $k->Id_Kelas; ?>" data-wali_kelas="<?= $k->Wali_Kelas; ?>">Hapus</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Naik -->
    <form action="/Kelas/naik" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="naikModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menaikkan semua kelas?</h5>
            </div>

            <div class="modal-footer">
              <!-- <input type="hidden" name="id_user" class="id_user1"> -->
              <p style="color: red;">*Jika Anda <b>menaikkan kelas</b>, pastikan Anda melakukan penyesuaian <b>semester</b> dan <b>tahun ajaran</b> pada menu <b><a href="/welcome">Welcome</a></b></p>
              <button type="submit" class="btn btn-success">Ya</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Naik -->

    <!-- Modal Tambah -->
    <form action="/Kelas/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Kelas</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Tingkat</label>
                <!-- <input type="text" class="form-control" name="tingkat" placeholder="" required> -->
                <select name="tingkat" class="form-control" required>
                  <option value="">Pilih Tingkat</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <input type="text" class="form-control" name="jurusan" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Abjad</label>
                <input type="text" class="form-control" name="abjad" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Wali Kelas</label>
                <select name="wali_kelas" class="form-control ">
                  <option value="">Pilih Wali Kelas</option>
                  <?php foreach ($nama as $n) : ?>
                    <?php if ($n->Is_Wali_Kelas == 0) { ?>
                      <option value="<?= $n->Id_User; ?>"><?= $n->Nama; ?></option>
                    <?php }; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <!-- <input type="hidden" name="id_user" class="id_user1"> -->
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Tambah -->

    <!-- Modal Edit -->
    <form action="/Kelas/edit/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Edit User</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Tingkat</label>
                <!-- <input type="text" class="form-control tingkat" name="tingkat" placeholder="" required> -->
                <select name="tingkat" class="form-control tingkat" required>
                  <option value="">Pilih Tingkat</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <input type="text" class="form-control jurusan" name="jurusan" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Abjad</label>
                <input type="text" class="form-control abjad" name="abjad" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Wali Kelas</label>
                <select name="wali_kelas" class="form-control wali_kelas">
                  <option value="">Pilih Wali Kelas</option>
                  <option value="" id="wali" hidden></option>
                  <?php foreach ($nama as $n) : ?>
                    <?php if ($n->Is_Wali_Kelas == 0) { ?>
                      
                      <option value="<?= $n->Id_User; ?>"><?= $n->Nama; ?></option>
                    <?php }; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <input type="hidden" name="id_kelas" class="id_kelas1">
              <input type="hidden" name="id_lama" class="id_lama">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/Kelas/delete/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_kelas" class="id_kelas2">
              <input type="hidden" name="wali_kelas" class="wali_kelas">
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
        $('.btn-edit').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_kelas');
          const tingkat = $(this).data('tingkat');
          const jurusan = $(this).data('jurusan');
          const abjad = $(this).data('abjad');
          const wali_kelas = $(this).data('wali_kelas');
          // Set data to Form Edit
          $('.id_kelas1').val(id);
          $('.tingkat').val(tingkat);
          $('.jurusan').val(jurusan);
          $('.abjad').val(abjad);
          $("#wali").val(wali_kelas);
          $("#wali").html($(this).data('nama'));
          $('.wali_kelas').val(wali_kelas).trigger('change');
          $('.id_lama').val($(this).data('id_lama'));

          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_kelas');
          // Set data to Form Edit
          $('.id_kelas2').val(id);
          $('.wali_kelas').val($(this).data('wali_kelas'));
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <?= $this->endSection() ?>