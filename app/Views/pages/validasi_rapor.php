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
              <!-- <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Tambah</button> -->
            </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Nama </th>
                  <th> Kelas </th>
                  <th> Semester </th>
                  <th> Tahun Ajaran </th>
                  <th> Validasi </th>
                  <th>  </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($rapor as $r) : ?>
                  <tr>
                    <td class="number"> <?= $i++; ?> </td>
                    <td> <?= $r->Id_Siswa; ?> </td>
                    <td>  </td>
                    <td> <?= $r->Semester; ?> </td>
                    <td> <?= $r->Tahun_Ajaran; ?> </td>
                    <td> <?= $r->Is_Validasi; ?> </td>
                    <td> </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



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