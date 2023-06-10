<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-3"> Selamat Datang <?= session()->get('nama'); ?> </h2>
    </div>




    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-inline">Informasi Umum</h4>
            <div class="float-right">
              <?php if (session()->getFlashdata('pesan')) : ?>
                <p class="card-description mr-3 text-success d-inline">
                  <?= session()->getFlashdata('pesan'); ?>
                </p>
              <?php endif; ?>
              <?php if (is_int(strpos(session()->get('akses'), 'Admin'))) { ?>
                <?php foreach ($general as $g) : ?>
                  <button type="button" class="btn btn-success mb-2 btn-edit" data-toggle="modal" data-target="#editModal" data-id_general="<?= $g->Id_General; ?>" data-nama_sekolah="<?= $g->Nama_Sekolah; ?>" data-semester="<?= $g->Semester; ?>" data-tahun_ajaran="<?= $g->Tahun_Ajaran; ?>">Edit</button>
                <?php endforeach; ?>
              <?php }; ?>
            </div>
            <table class="table table-borderless mt-3">
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($general as $g) : ?>
                  <tr>
                    <th style="width: 250px;"> Nama Sekolah </th>
                    <td style="width: 50px;">:</td>
                    <td> <?= $g->Nama_Sekolah; ?> </td>
                  </tr>
                  <tr>
                    <th> Nama Kepala Sekolah </th>
                    <td>:</td>
                    <?php foreach ($user as $u) :
                      if (is_int(strpos($u->Akses, 'Kepala Sekolah'))) { ?>
                        <td> <?= $u->Nama; ?> </td>
                    <?php };
                    endforeach; ?>
                  </tr>
                  <tr>
                    <th> NIP </th>
                    <td>:</td>
                    <?php foreach ($user as $u) :
                      if (is_int(strpos($u->Akses, 'Kepala Sekolah'))) { ?>
                        <td> <?= $u->NIP; ?> </td>
                    <?php };
                    endforeach; ?>
                  </tr>

                  <tr>
                    <th> Semester </th>
                    <td>:</td>
                    <td> <?= $g->Semester; ?> </td>
                  </tr>
                  <tr>
                    <th> Tahun Ajaran </th>
                    <td>:</td>
                    <td> <?= $g->Tahun_Ajaran; ?> </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <form action="/Welcome/edit/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Edit Informasi Umum</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Sekolah</label>
                <input type="text" class="form-control nama_sekolah" name="nama_sekolah" placeholder="" value="" required>
              </div>
              <!-- <div class="form-group">
                <label>Nama Kepala Sekolah</label>
                <input type="text" class="form-control nama_kepsek" name="nama_kepsek" placeholder="" value="" required>
              </div>
              <div class="form-group">
                <label>NIP</label>
                <input type="number" class="form-control nip" name="nip" placeholder="" value="" required>
              </div> -->
              <div class="form-group">
                <label>Semester</label>
                <!-- <input type="text" class="form-control semester" name="semester" placeholder="" value="" required> -->
                <select name="semester" class="form-control semester" required>
                  <option value="">Pilih Semester</option>
                  <option value="Ganjil">Ganjil</option>
                  <option value="Genap">Genap</option>
                </select>
              </div>
              <div class="form-group">
                <label>Tahun Ajaran</label>
                <input type="text" class="form-control tahun_ajaran" name="tahun_ajaran" placeholder="" value="" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_general" class="id_general">
              <p style="color: red;">*Jika Anda melakukan perubahan pada <b>semester</b> dan <b>tahun ajaran</b>, pastikan Anda melakukan penyesuaian kenaikan kelas pada menu <b><a href="/kelas">Kelas</a></b></p>
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <script src="<?php echo base_url(); ?>/assets/js/jquery-3.4.1.min.js"></script>
    <script>
      $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_general');
          const sekolah = $(this).data('nama_sekolah');
          // const kepsek = $(this).data('nama_kepsek');
          // const nip = $(this).data('nip');
          const semester = $(this).data('semester');
          const tahun = $(this).data('tahun_ajaran');
          // Set data to Form Edit
          $('.id_general').val(id);
          $('.nama_sekolah').val(sekolah);
          // $('.nama_kepsek').val(kepsek);
          // $('.nip').val(nip);
          $('.semester').val(semester);
          $('.tahun_ajaran').val(tahun);
          // Call Modal Edit
          $('#editModal').modal('show');
        });
      });
    </script>

    <?= $this->endSection() ?>