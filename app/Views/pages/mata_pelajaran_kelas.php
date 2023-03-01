<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Mata Pelajaran Kelas </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-inline">Tabel Mata Pelajaran Kelas</h4>

            <form class="form-inline" action="/MataPelajaranKelas/get" method="post">
              <?= csrf_field(); ?>
              <div class="form-group mr-4 my-sm-3">
                <select name="pilih_kelas" class="form-control pr-xl-5 pilih_kelas">
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Kelas; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary mb-2">Pilih</button>
            </form>

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
                  <th hidden> Kelas </th>
                  <th> Mata Pelajaran </th>
                  <th> Guru Mata Pelajaran </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mapelKelas as $m) : ?>
                  <tr>
                    <td> <?= $i++; ?> </td>
                    <td hidden> <?= $m->Kelas; ?> </td>
                    <td> <?= $m->Mata_Pelajaran; ?> </td>
                    <td> <?= $m->Nama; ?> </td>
                    <td class="text-center">
                      <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_mapelkelas="<?= $m->Id_Mapel_Kelas; ?>" data-kelas="<?= $m->Id_Kelas; ?>" data-mapel="<?= $m->Id_Mata_Pelajaran; ?>" data-guru="<?= $m->Guru_Mapel; ?>">Edit</button>
                      <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal" data-id_mapelkelas="<?= $m->Id_Mapel_Kelas; ?>">Hapus</button>
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
    <form action="/MataPelajaranKelas/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Kelas</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Kelas</label>
                <input type="text" class="form-control" name="kelas" placeholder="" disabled>
              </div>
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" class="form-control" name="mapel" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Guru Mata Pelajaran</label>
                <input type="text" class="form-control" name="guru" placeholder="" required>
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
    <form action="/MataPelajaranKelas/edit/" method="post">
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
                <label>Mata Pelajaran</label>
                <input type="text" class="form-control mapel" name="mapel" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Guru Mata Pelajaran</label>
                <input type="text" class="form-control guru" name="guru" placeholder="" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_kelas" class="id_mapelkelas1">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/MataPelajaranKelas/delete/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_kelas" class="id_mapelkelas2">
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
          const id = $(this).data('id_mapelkelas');
          const kelas = $(this).data('kelas');
          const mapel = $(this).data('mapel');
          const guru = $(this).data('guru');
          // Set data to Form Edit
          $('.id_mapelkelas1').val(id);
          $('.kelas').val(kelas);
          $('.mapel').val(mapel);
          $('.guru').val(guru);
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_mapelkelas');
          // Set data to Form Edit
          $('.id_mapelkelas2').val(id);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <?= $this->endSection() ?>