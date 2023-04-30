<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Validasi Rapor </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-inline">Tabel Validasi Rapor</h4>
            <div class="float-right">
              <?php if (session()->getFlashdata('pesan')) : ?>
                <p class="card-description mr-3 text-success d-inline">
                  <?= session()->getFlashdata('pesan'); ?>
                </p>
              <?php endif; ?>
              <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#allModal">Validasi Semua Rapor</button>
            </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Nama </th>
                  <th> Kelas </th>
                  <th> Semester </th>
                  <th> Tahun Ajaran </th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($rapor as $r) : ?>
                  <tr>
                    <td class="number"> <?= $i++; ?> </td>
                    <td> <?= $r->Nama; ?> </td>
                    <td> <?= $r->Tingkat; ?>-<?= $r->Jurusan; ?>-<?= $r->Abjad; ?> </td>
                    <td> <?= $r->Semester; ?> </td>
                    <td> <?= $r->Tahun_Ajaran; ?> </td>
                    <td class="text-center">
                      <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#oneModal" data-id_siswa="<?= $r->Id_Siswa; ?>" data-semester="<?= $r->Semester; ?>" data-tahun="<?= $r->Tahun_Ajaran; ?>" data-id_rapor="<?= $r->Id_Rapor; ?>"> Validasi </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal All -->
    <form action="/ValidasiRapor/all" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="allModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin melakukan validasi semua rapor?</h5>
            </div>

            <div class="modal-footer">
              <!-- <input type="hidden" name="siswa" class="siswa" value="">
              <input type="hidden" name="semester" class="semester" value="">
              <input type="hidden" name="tahun" class="tahun" value=""> -->

              <button type="submit" class="btn btn-success">Ya</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal All -->

    <!-- Modal One -->
    <form action="/ValidasiRapor/one" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="oneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin melakukan validasi rapor ini?</h5>
            </div>

            <div class="modal-footer">
              <input type="hidden" name="id_rapor" class="rapor" value="">
              <!-- <input type="hidden" name="siswa" class="siswa" value="">
              <input type="hidden" name="semester" class="semester" value="">
              <input type="hidden" name="tahun" class="tahun" value=""> -->

              <button type="submit" class="btn btn-success">Ya</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal One -->

    <script src="<?php echo base_url(); ?>/assets/js/jquery-3.4.1.min.js"></script>
    <script>
      $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_rapor');
          // const id = $(this).data('id_siswa');
          // const smt = $(this).data('semester');
          // const thn = $(this).data('tahun');

          // Set data to Form Edit
          $('.rapor').val(id);
          // $('.siswa').val(id);
          // $('.semester').val(smt);
          // $('.tahun').val(thn);

          // Call Modal Edit
          $('#oneModal').modal('show');
        });

      });
    </script>

    <?= $this->endSection() ?>