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
            <div class="float-right">
              <?php if (session()->getFlashdata('pesan')) : ?>
                <p class="card-description mr-3 text-success d-inline">
                  <?= session()->getFlashdata('pesan'); ?>
                </p>
              <?php endif; ?>
              <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Tambah</button>
            </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Kelas </th>
                  <th> NIS </th>
                  <!-- <th> Kelas </th> -->
                  <th> Nama </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($siswaKelas as $s) : ?>
                  <tr>
                    <td> <?= $i++; ?> </td>
                    <td> <?= $s->Kelas; ?> </td>
                    <td> <?= $s->NIS; ?> </td>
                    <td> <?= $s->Nama; ?> </td>
                    <td class="text-center">
                      <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-kelas="<?= $s->Id_Kelas; ?>" data-nis="<?= $s->NIS; ?>" >Edit</button>
                      <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal" data-nis="<?= $s->NIS; ?>">Hapus</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Tambah -->
    <form action="/Siswa/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Siswa</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Kelas</label>
                <!-- <input type="text" class="form-control" name="kelas" placeholder="" required> -->
                <select name="kelas" class="form-control kelas" required>
                  <option value="">Pilih</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Kelas; ?>"><?= $k->Kelas; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>NIS</label>
                <!-- <input type="text" class="form-control" name="nis" placeholder="" required> -->
                <select name="nis" class="form-control nis" required>
                  <option value="">Pilih</option>
                  <?php foreach ($siswaKelas as $s) : ?>
                    <option value="<?= $s->NIS; ?>"><?= $s->NIS; ?></option>
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
    <form action="/Siswa/edit/" method="post">
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
                <input type="text" class="form-control kelas" name="kelas" placeholder="" required>
              </div>
              <div class="form-group">
                <label>NIS</label>
                <input type="text" class="form-control nis" name="nis" placeholder="" required>
              </div>

            </div>
            <div class="modal-footer">
              <input type="hidden" name="nis" class="nis1">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/Siswa/delete/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="nis" class="nis2">
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
          const kelas = $(this).data('kelas');
          const nis = $(this).data('nis');
          // const nama = $(this).data('nama');
          // Set data to Form Edit
          $('.kelas').val(kelas).trigger('change');
          $('.nis1').val(nis).trigger('change');
          // $('.nama').val(nama).trigger('change');
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const nis = $(this).data('nis');
          // Set data to Form Edit
          $('.nis2').val(nis);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <?= $this->endSection() ?>