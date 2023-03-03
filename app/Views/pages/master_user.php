<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Master User </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-inline">Tabel Daftar User</h4>
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
                  <th> Nama </th>
                  <th> NIP </th>
                  <th> Email </th>
                  <th> Akses </th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($user as $u) : ?>
                  <tr>
                    <td class="number"> <?= $i++; ?> </td>
                    <td> <?= $u->Nama; ?> </td>
                    <td> <?= $u->NIP; ?> </td>
                    <td> <?= $u->Email; ?> </td>
                    <td style="max-width: 200px; white-space: normal !important;"> <?= $u->Akses; ?> </td>
                    <td class="text-center">
                      <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_user="<?= $u->Id_User; ?>" data-email="<?= $u->Email; ?>" data-password="<?= $u->Password; ?>" data-nama="<?= $u->Nama; ?>" data-nip="<?= $u->NIP; ?>" data-akses="<?= $u->Akses; ?>">Edit</button>
                      <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal" data-id_user="<?= $u->Id_User; ?>">Hapus</button>
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
    <form action="/MasterUser/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah User</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="" required>
              </div>
              <div class="form-group">
                <label>NIP</label>
                <input type="text" class="form-control" name="nip" placeholder="">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password" placeholder="" required>
              </div>
              <div class="form-group">
                <!-- <label>Admin</label> -->
                <!-- <select name="hak_akses" class="form-control hak_akses" required>
                  <option value="">Pilih</option>
                  <option value="Admin">Admin</option>
                  <option value="Guru Mata Pelajaran">Guru Mata Pelajaran</option>
                  <option value="Guru Monitoring">Guru Monitoring</option>
                  <option value="Pembina Ekstrakurikuler">Pembina Ekstrakurikuler</option>
                  <option value="Guru BK">Guru BK</option>
                  <option value="Wali Kelas">Wali Kelas</option>
                </select> -->
                <!-- <input type="checkbox" class="admin" name="admin" value="1" required> -->
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Admin"> Admin </label>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Guru Mata Pelajaran"> Guru Mata Pelajaran </label>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Guru Monitoring"> Guru Monitoring </label>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Pembina Ekstrakurikuler"> Pembina Ekstrakurikuler </label>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Guru BK"> Guru BK </label>
                </div>
                <!-- <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Wali Kelas"> Wali Kelas </label>
                </div> -->
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
    <form action="/MasterUser/edit/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Edit User</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control nama" name="nama" placeholder="" value="" required>
              </div>
              <div class="form-group">
                <label>NIP</label>
                <input type="text" class="form-control nip" name="nip" placeholder="" value="">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control email" name="email" placeholder="" value="" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control password" name="password" placeholder="" value="" required>
              </div>

              <div class="form-group">
                <label>Akses</label><br>
                <!-- <select name="akses" class="form-control akses" required>
                  <option value="">Pilih</option>
                  <option value="Admin">Admin</option>
                  <option value="Guru Mata Pelajaran">Guru Mata Pelajaran</option>
                  <option value="Guru Monitoring">Guru Monitoring</option>
                  <option value="Pembina Ekstrakurikuler">Pembina Ekstrakurikuler</option>
                  <option value="Guru BK">Guru BK</option>
                  <option value="Wali Kelas">Wali Kelas</option>
                  <option value="1">1</option>
                  <option value="0">0</option>
                </select> -->
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Admin"> Admin </label>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Guru Mata Pelajaran"> Guru Mata Pelajaran </label>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Guru Monitoring"> Guru Monitoring </label>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Pembina Ekstrakurikuler"> Pembina Ekstrakurikuler </label>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Guru BK"> Guru BK </label>
                </div>
                <!-- <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input akses" name="akses[]" value="Wali Kelas"> Wali Kelas </label>
                </div> -->
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_user" class="id_user1">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/MasterUser/delete/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_user" class="id_user2">
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
          const id = $(this).data('id_user');
          const email = $(this).data('email');
          const password = $(this).data('password');
          const nama = $(this).data('nama');
          const nip = $(this).data('nip');
          // Set data to Form Edit
          $('.id_user1').val(id);
          $('.email').val(email);
          $('.password').val(password);
          $('.nama').val(nama);
          $('.nip').val(nip);
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_user');
          // Set data to Form Edit
          $('.id_user2').val(id);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <?= $this->endSection() ?>