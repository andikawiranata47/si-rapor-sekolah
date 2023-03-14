<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Mata Pelajaran </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-inline">Tabel Daftar Mata Pelajaran</h4>
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
                  <th> Mata Pelajaran </th>
                  <th> Kelompok </th>
                  <th> KKM </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mapel as $m) : ?>
                  <tr>
                    <td class="number"> <?= $i++; ?> </td>
                    <td> <?= $m->Mata_Pelajaran; ?> </td>
                    <td> <?= $m->Kelompok; ?> </td>
                    <td> <?= $m->KKM; ?> </td>
                    <td class="text-center">
                      <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_mapel="<?= $m->Id_Mata_Pelajaran; ?>" data-mapel="<?= $m->Mata_Pelajaran; ?>" data-kelompok="<?= $m->Kelompok; ?>" data-kkm="<?= $m->KKM; ?>">Edit</button>
                      <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal" data-id_mapel="<?= $m->Id_Mata_Pelajaran; ?>">Hapus</button>
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
    <form action="/MataPelajaran/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Mata Pelajaran</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" class="form-control" name="mapel" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Kelompok</label>
                <!-- <input type="text" class="form-control" name="kelompok" placeholder="" required> -->
                <select name="kelompok" class="form-control " required>
                  <option value="">Pilih Kelompok</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
              <div class="form-group">
                <label>KKM</label>
                <input type="number" class="form-control" name="kkm" placeholder="" required>
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
    <form action="/MataPelajaran/edit/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Edit User</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" class="form-control mapel" name="mapel" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Kelompok</label>
                <!-- <input type="text" class="form-control kelompok" name="kelompok" placeholder="" required> -->
                <select name="kelompok" class="form-control kelompok" required>
                  <option value="">Pilih Kelompok</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
              <div class="form-group">
                <label>KKM</label>
                <input type="number" class="form-control kkm" name="kkm" placeholder="" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_mapel" class="id_mapel1">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/MataPelajaran/delete/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_mapel" class="id_mapel2">
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
          const id = $(this).data('id_mapel');
          const mapel = $(this).data('mapel');
          const kelompok = $(this).data('kelompok');
          const kkm = $(this).data('kkm');
          // Set data to Form Edit
          $('.id_mapel1').val(id);
          $('.mapel').val(mapel);
          $('.kelompok').val(kelompok);
          $('.kkm').val(kkm);
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_mapel');
          // Set data to Form Edit
          $('.id_mapel2').val(id);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <?= $this->endSection() ?>