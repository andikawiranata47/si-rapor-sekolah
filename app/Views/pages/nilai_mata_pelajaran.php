<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Nilai Mata Pelajaran </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-inline">Tabel Daftar Nilai Mata Pelajaran</h4>

            <form class="form-inline" action="/NilaiMataPelajaran/get" method="post">
              <?= csrf_field(); ?>
              <div class="form-group mr-4 my-sm-3">
                <?php foreach ($general as $g) : ?>
                  <input type="text" class="form-control pilih_semester" name="" value="<?= $g->Semester; ?>" disabled>
                  <input type="text" class="form-control pilih_semester" name="pilih_semester" value="<?= $g->Semester; ?>" hidden>

                  <input type="text" class="form-control mx-2 pilih_tahun" name="" value="<?= $g->Tahun_Ajaran; ?>" disabled>
                  <input type="text" class="form-control mx-2 pilih_tahun" name="pilih_tahun" value="<?= $g->Tahun_Ajaran; ?>" hidden>
                <?php endforeach; ?>
                <select name="pilih_kelas" class="form-control pr-xl-5 pilih_kelas" id="pilih_kelas">
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k->Id_Kelas; ?>"><?= $k->Kelas; ?></option>
                  <?php endforeach; ?>
                </select>
                <select name="pilih_jenis" class="form-control mx-2 pr-xl-5 pilih_jenis" id="pilih_jenis">
                  <option value="">Pilih Jenis Nilai</option>
                  <option value="Pengetahuan">Pengetahuan</option>
                  <option value="Keterampilan">Keterampilan</option>

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
              </div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nama </th>
                    <th> Jenis Nilai </th>
                    <!-- <th> Nilai Akhir </th> -->

                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
<?php foreach ($siswa as $s) : ?>
                  <tr>
                    
                      <td class="number"> <?= $i++; ?> </td>
                      <td> <?= $s->Nama; ?> </td>
<?php foreach ($nilaiMapel as $n) : ?>
                      <td class="number"> <?= $i++; ?> </td>
                      <td> <?= $n->Jenis_Nilai; ?> </td>
                      <?php break; ?>

                      
                    <?php endforeach; ?>

                      <td class="text-center">
                        <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal">Edit</button>
                        <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal">Hapus</button>
                      </td>
                    
                  </tr><?php endforeach; ?>
                  <tr>
                    
                  </tr>

                </tbody>
              </table>
            <?php }; ?>

          </div>
        </div>
      </div>
    </div>

    <!-- Modal Tambah -->
    <form action="/NilaiMataPelajaran/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Nilai Mata Pelajaran</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>NIS</label>
                <input type="text" class="form-control" name="nis" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" class="form-control" name="mapel" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Jenis Nilai</label>
                <select name="jenis" class="form-control jenis" required>
                  <option value="">Pilih</option>
                  <option value="Pengetahuan">Pengetahuan</option>
                  <option value="Keterampilan">Keterampilan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Nilai UH</label>
                <input type="text" class="form-control" name="uh" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nilai UTS</label>
                <input type="text" class="form-control" name="uts" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nilai UAS</label>
                <input type="text" class="form-control" name="uas" placeholder="" required>
              </div>
              <!-- <div class="form-group">
                <label>Nilai Akhir</label>
                <input type="text" class="form-control" name="akhir" placeholder="" required>
              </div> -->
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
    <form action="/NilaiMataPelajaran/edit/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Edit User</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>NIS</label>
                <input type="text" class="form-control nis" name="nis" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" class="form-control mapel" name="mapel" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Jenis Nilai</label>
                <select name="jenis" class="form-control jenis" required>
                  <option value="">Pilih</option>
                  <option value="Pengetahuan">Pengetahuan</option>
                  <option value="Keterampilan">Keterampilan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Nilai UH</label>
                <input type="text" class="form-control uh" name="uh" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nilai UTS</label>
                <input type="text" class="form-control uts" name="uts" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nilai UAS</label>
                <input type="text" class="form-control uas" name="uas" placeholder="" required>
              </div>
              <!-- <div class="form-group">
                <label>Nilai Akhir</label>
                <input type="text" class="form-control akhir" name="akhir" placeholder="" required>
              </div> -->
              <div class="modal-footer">
                <input type="hidden" name="id_nilaimapel" class="id_nilaimapel1">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/NilaiMataPelajaran/delete/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_nilaimapel" class="id_nilaimapel2">
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
          const id = $(this).data('id_nilaimapel');
          const nis = $(this).data('nis');
          const mapel = $(this).data('mapel');
          const jenis = $(this).data('jenis');
          const uh = $(this).data('uh');
          const uts = $(this).data('uts');
          const uas = $(this).data('uas');
          // const akhir = $(this).data('akhir');
          // Set data to Form Edit
          $('.id_nilaimapel1').val(id);
          $('.nis').val(nis);
          $('.mapel').val(mapel);
          $('.jenis').val(jenis).trigger('change');
          $('.uh').val(uh);
          $('.uts').val(uts);
          $('.uas').val(uas);
          // $('.akhir').val(akhir);
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_nilaimapel');
          // Set data to Form Edit
          $('.id_nilaimapel2').val(id);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <?= $this->endSection() ?>