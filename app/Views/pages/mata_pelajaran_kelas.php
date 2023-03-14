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

            <form class="form-inline" action="/matapelajarankelas/get" method="post">
              <?= csrf_field(); ?>
              <div class="form-group mr-4 my-sm-3">
                <select name="pilih_kelas" class="form-control pr-xl-5 pilih_kelas" id="pilih_kelas">
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Tingkat; ?>-<?= $k->Jurusan; ?>-<?= $k->Abjad; ?></option>
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
                <button type="button" class="btn btn-success mb-2 btn-add" data-toggle="modal" data-target="#addModal" data-kelas="<?= $id; ?>">Tambah</button>
              </div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Kelas </th>
                    <th> Mata Pelajaran </th>
                    <!-- <th> Guru Mata Pelajaran </th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($mapelKelas as $m) : ?>
                    <tr>
                      <td class="number"> <?= $i++; ?> </td>
                      <td> <?= $m->Tingkat; ?>-<?= $m->Jurusan; ?>-<?= $m->Abjad; ?> </td>
                      <td> <?= $m->Mata_Pelajaran; ?> </td>

                      <td class="text-center">
                        <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_mapelkelas="<?= $m->Id_Mapel_Kelas; ?>" data-kelas="<?= $m->Id_Kelas; ?>" data-mapel="<?= $m->Id_Mata_Pelajaran; ?>" data-nama_mapel="<?= $m->Mata_Pelajaran; ?>">Edit</button>
                        <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal" data-id_mapelkelas="<?= $m->Id_Mapel_Kelas; ?>" data-kelas="<?= $m->Id_Kelas; ?>">Hapus</button>
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
    <form action="/matapelajarankelas/save" method="post">
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
                <select name="kelas" class="form-control kelas" disabled>
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Tingkat; ?>-<?= $k->Jurusan; ?>-<?= $k->Abjad; ?></option>
                  <?php endforeach; ?>
                </select>
                <select name="kelas" class="form-control kelas" hidden>
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Tingkat; ?>-<?= $k->Jurusan; ?>-<?= $k->Abjad; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label>Mata Pelajaran</label>
                <select name="mapel" class="form-control">
                  <option value="">Pilih Mata Pelajaran</option>

                  <?php foreach ($mapel as $m) : ?>
                    <?php $a = false ?>
                    <?php foreach ($mapelKelas as $mk) : ?>
                      <?php if ($m->Id_Mata_Pelajaran === $mk->Id_Mata_Pelajaran) {
                        $a = $a || true;
                      }; ?>
                    <?php endforeach; ?>
                    <?php if (!$a) { ?>
                      <option value="<?= $m->Id_Mata_Pelajaran; ?>"><?= $m->Mata_Pelajaran; ?></option>
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
    <form action="/matapelajarankelas/edit/" method="post">
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
                <select name="kelas" class="form-control kelas" disabled>
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Tingkat; ?>-<?= $k->Jurusan; ?>-<?= $k->Abjad; ?></option>
                  <?php endforeach; ?>
                </select>
                <select name="kelas" class="form-control kelas" hidden>
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Tingkat; ?>-<?= $k->Jurusan; ?>-<?= $k->Abjad; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <select name="mapel" class="form-control mapel">
                  <option value="">Pilih Mata Pelajaran</option>
                  <option value="" id="mapel" hidden></option>
                  <?php foreach ($mapel as $m) : ?>
                    <?php $a = false ?>
                    <?php foreach ($mapelKelas as $mk) : ?>
                      <?php if ($m->Id_Mata_Pelajaran === $mk->Id_Mata_Pelajaran) {
                        $a = $a || true;
                      }; ?>
                    <?php endforeach; ?>
                    <?php if (!$a) { ?>
                      <option value="<?= $m->Id_Mata_Pelajaran; ?>"><?= $m->Mata_Pelajaran; ?></option>
                    <?php }; ?>
                  <?php endforeach; ?>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_mapelkelas" class="id_mapelkelas1">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/matapelajarankelas/delete/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <select name="kelas" class="form-control kelas" hidden>
              <option value="">Pilih Kelas</option>
              <?php foreach ($kelas as $k) : ?>
                <option value="<?= $k->Id_Kelas; ?>"><?= $k->Tingkat; ?>-<?= $k->Jurusan; ?>-<?= $k->Abjad; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="modal-footer">
              <input type="hidden" name="id_mapelkelas" class="id_mapelkelas2">
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
          const kelas = $(this).data('kelas');
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
          const id = $(this).data('id_mapelkelas');
          const kelas = $(this).data('kelas');
          const mapel = $(this).data('mapel');
          const guru = $(this).data('guru');
          // Set data to Form Edit
          $("#mapel").val(mapel);
          $("#mapel").html($(this).data('nama_mapel'));
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
          const kelas = $(this).data('kelas');
          // Set data to Form Edit
          $('.id_mapelkelas2').val(id);
          $('.kelas').val(kelas);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <!-- <script>
      $('#pilih_kelas').change(function(event) {
        var selectedcategory = $(this).children("option:selected").val();
        sessionStorage.setItem("itemName", selectedcategory);
      });

      $('select').find('option[value=' + sessionStorage.getItem('itemName') + ']').attr('selected', 'selected');
    </script> -->

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