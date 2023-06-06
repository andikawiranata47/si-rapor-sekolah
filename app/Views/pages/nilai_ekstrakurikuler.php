<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Nilai Ekstrakurikuler </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tabel Daftar Nilai Ekstrakurikuler</h4>

            <form class="form-inline" action="/nilaiekstrakurikuler/get" method="post">
              <?= csrf_field(); ?>
              <div class="form-group">
                <?php foreach ($general as $g) : ?>
                  <input type="text" class="form-control pilih_semester" style="width: 85px;" name="" value="<?= $g->Semester; ?>" disabled>
                  <input type="text" class="form-control pilih_semester" name="pilih_semester" value="<?= $g->Semester; ?>" hidden>

                  <input type="text" class="form-control mx-2 pilih_tahun" style="width: 120px;" name="" value="<?= $g->Tahun_Ajaran; ?>" disabled>
                  <input type="text" class="form-control mx-2 pilih_tahun" name="pilih_tahun" value="<?= $g->Tahun_Ajaran; ?>" hidden>

                  
                  <input type="text" class="pilih_guru" name="pilih_guru" id="pilih_guru" value="<?= session()->get('id_user'); ?>" hidden>
                <?php endforeach; ?>


              </div><button type="submit" class="btn btn-primary mb-2">Pilih</button>
            </form>


            <?php if ($pguru != null && $psemester != null && $ptahun != null) { ?>
              <div class="float-right">
                <?php if (session()->getFlashdata('pesan')) : ?>
                  <p class="card-description mr-3 text-success d-inline">
                    <?= session()->getFlashdata('pesan'); ?>
                  </p>
                <?php endif; ?>
                <button type="button" class="btn btn-success mb-2 btn-add" data-toggle="modal" data-target="#addModal">Tambah</button>
              </div>

              <table class="table table-bordered table-responsive-sm">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nama </th>
                    <th> Nama Ekstrakurikuler </th>
                    <th> Predikat </th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($ekstra as $e) : ?>
                    <tr>
                      <td class="number"> <?= $i++; ?> </td>
                      <td> <?= $e->Nama; ?> </td>
                      <td> <?= $e->Nama_Ekstrakurikuler; ?> </td>
                      <td> <?= $e->Predikat; ?> </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_ekstra="<?= $e->Id_Nilai_Ekstrakurikuler; ?>" data-nama="<?= $e->Nama_Ekstrakurikuler; ?>" data-predikat="<?= $e->Predikat; ?>" data-siswa="<?= $e->Id_Siswa; ?>">Edit</button>
                        <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal" data-id_ekstra="<?= $e->Id_Nilai_Ekstrakurikuler; ?>">Hapus</button>
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
    <form action="/nilaiekstrakurikuler/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Nilai Ekstrakurikuler</h5>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control " name="pilih_guru" value="<?= $pguru; ?>" hidden>
              <input type="text" class="form-control " name="pilih_semester" value="<?= $psemester; ?>" hidden>
              <input type="text" class="form-control " name="pilih_tahun" value="<?= $ptahun; ?>" hidden>
              <div class="form-group">
                <label>Siswa</label>
                <select name="siswa" class="form-control " required>
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswa as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>"><?= $s->Nama; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Ekstrakurikuler</label>
                <input type="text" class="form-control " name="nama" required>
              </div>
              <div class="form-group">
                <label>Predikat</label>
                <select name="predikat" class="form-control " required>
                  <option value="">Pilih Predikat</option>
                  <option value="Baik">Baik</option>
                  <option value="Cukup">Cukup</option>
                  <option value="Kurang">Kurang</option>
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
    <form action="/nilaiekstrakurikuler/edit" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Edit Nilai Ekstrakurikuler</h5>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control " name="pilih_guru" value="<?= $pguru; ?>" hidden>
              <input type="text" class="form-control " name="pilih_semester" value="<?= $psemester; ?>" hidden>
              <input type="text" class="form-control " name="pilih_tahun" value="<?= $ptahun; ?>" hidden>
              <div class="form-group">
                <label>Siswa</label>
                <select name="" class="form-control siswa" disabled>
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswa as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>"><?= $s->Nama; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Ekstrakurikuler</label>
                <input type="text" class="form-control nama" name="nama" required>
              </div>
              <div class="form-group">
                <label>Predikat</label>
                <select name="predikat" class="form-control predikat" required>
                  <option value="">Pilih Predikat</option>
                  <option value="Baik">Baik</option>
                  <option value="Cukup">Cukup</option>
                  <option value="Kurang">Kurang</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_ekstra" class="id_ekstra">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Delete -->
    <form action="/nilaiekstrakurikuler/delete" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <input type="text" class="form-control " name="pilih_guru" value="<?= $pguru; ?>" hidden>
            <input type="text" class="form-control " name="pilih_semester" value="<?= $psemester; ?>" hidden>
            <input type="text" class="form-control " name="pilih_tahun" value="<?= $ptahun; ?>" hidden>
            <div class="modal-footer">
              <input type="hidden" name="id_ekstra" class="id_ekstra">
              <button type="submit" class="btn btn-success">Ya</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Delete -->

    <script>
      $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_ekstra');
          const nama = $(this).data('nama');
          const predikat = $(this).data('predikat');
          const siswa = $(this).data('siswa');

          // Set data to Form Edit
          $('.id_ekstra').val(id);
          $('.siswa').val(siswa);
          $('.nama').val(nama);
          $('.predikat').val(predikat);
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_ekstra');
          // Set data to Form Edit
          $('.id_ekstra').val(id);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <?= $this->endSection() ?>