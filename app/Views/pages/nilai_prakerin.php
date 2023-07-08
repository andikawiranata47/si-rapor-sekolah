<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Nilai Prakerin </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tabel Daftar Nilai Prakerin</h4>

            <form class="form-inline" action="/nilaiprakerin/get" method="post">
              <?= csrf_field(); ?>
              <div class="form-group">
                <?php foreach ($general as $g) : ?>
                  <select name="pilih_semester" class="form-control pilih_semester" style="width: 85px;" id="">
                    <option value="<?= $g->Semester; ?>"><?= $g->Semester; ?></option>
                    <?php if ($g->Semester != 'Ganjil') { ?>
                      <option value="Ganjil">Ganjil</option>
                    <?php } ?>
                    <?php if ($g->Semester != 'Genap') { ?>
                      <option value="Genap">Genap</option>
                    <?php } ?>
                    
                  </select>

                  <select name="pilih_tahun" class="form-control mx-2 pilih_tahun" style="width: 120px;" id="">
                    <option value="<?= $g->Tahun_Ajaran; ?>"><?= $g->Tahun_Ajaran; ?></option>
                    <?php if ($g->Tahun_Ajaran != '2022/2023') { ?>
                      <option value="2022/2023">2022/2023</option>
                    <?php } ?>
                    <?php if ($g->Tahun_Ajaran != '2023/2024') { ?>
                      <option value="2023/2024">2023/2024</option>
                    <?php } ?>
                    <?php if ($g->Tahun_Ajaran != '2024/2025') { ?>
                      <option value="2024/2025">2024/2025</option>
                    <?php } ?>
                  </select>

                 
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
                    <th> Nama Instansi </th>
                    <th> Alamat Instansi </th>
                    <th> Waktu Pelaksanaan </th>
                    <th> Nilai Prakerin </th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($prakerin as $n) : ?>
                    <tr>
                      <td class="number"> <?= $i++; ?> </td>
                      <td> <?= $n->Nama; ?> </td>
                      <td> <?= $n->Nama_Instansi; ?> </td>
                      <td> <?= $n->Alamat_Instansi; ?> </td>
                      <td> <?= date('d F Y', strtotime("$n->Waktu_Mulai")); ?> - <?= date('d F Y', strtotime("$n->Waktu_Selesai")); ?> </td>
                      <td> <?= $n->Nilai_Prakerin; ?> </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_nilai="<?= $n->Id_Nilai_Prakerin; ?>" data-nama="<?= $n->Nama_Instansi; ?>" data-alamat="<?= $n->Alamat_Instansi; ?>" data-waktu1="<?= $n->Waktu_Mulai; ?>" data-waktu2="<?= $n->Waktu_Selesai; ?>" data-nilai="<?= $n->Nilai_Prakerin; ?>" data-siswa="<?= $n->Id_Siswa; ?>">Edit</button>
                        <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal" data-id_nilai="<?= $n->Id_Nilai_Prakerin; ?>">Hapus</button>
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
    <form action="/nilaiprakerin/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Nilai Prakerin</h5>
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
                <label>Nama Instansi</label>
                <input type="text" class="form-control " name="nama" required>
              </div>
              <div class="form-group">
                <label>Alamat Instansi</label>
                <textarea id="" class="form-control" name="alamat" rows="4" required></textarea>
              </div>
              <div class="form-group ">
                <label>Waktu Pelaksanaan</label>
                <div class="form-inline">
                  <label for=""></label>
                  <input type="date" class="form-control " name="waktu1" required>
                  <p>&nbsp; sampai &nbsp;</p>
                  <input type="date" class="form-control " name="waktu2" required>
                </div>
              </div>
              <div class="form-group">
                <label>Nilai Prakerin</label>
                <input type="number" class="form-control " name="nilai" required>
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
    <form action="/nilaiprakerin/edit" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Edit Nilai Prakerin</h5>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control " name="pilih_guru" value="<?= $pguru; ?>" hidden>
              <input type="text" class="form-control " name="pilih_semester" value="<?= $psemester; ?>" hidden>
              <input type="text" class="form-control " name="pilih_tahun" value="<?= $ptahun; ?>" hidden>
              <div class="form-group">
                <label>Siswa</label>
                <select name="siswa" class="form-control siswa" disabled>
                  <option value="">Pilih Siswa</option>
                  <?php foreach ($siswa as $s) : ?>
                    <option value="<?= $s->Id_Siswa; ?>"><?= $s->Nama; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Instansi</label>
                <input type="text" class="form-control nama" name="nama" required>
              </div>
              <div class="form-group">
                <label>Alamat Instansi</label>
                <textarea id="" class="form-control alamat" name="alamat" rows="4" required></textarea>
              </div>
              <div class="form-group ">
                <label>Waktu Pelaksanaan</label>
                <div class="form-inline">
                  <label for=""></label>
                  <input type="date" class="form-control waktu1" name="waktu1" required>
                  <p>&nbsp; sampai &nbsp;</p>
                  <input type="date" class="form-control waktu2" name="waktu2" required>
                </div>
              </div>
              <div class="form-group">
                <label>Nilai Prakerin</label>
                <input type="number" class="form-control nilai" name="nilai" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_nilai" class="id_nilai">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/nilaiprakerin/delete/" method="post">
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
              <input type="hidden" name="id_nilai" class="id_nilai">
              <button type="submit" class="btn btn-success">Ya</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Hapus -->

    <script>
      $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_nilai');
          const nama = $(this).data('nama');
          const alamat = $(this).data('alamat');
          const waktu1 = $(this).data('waktu1');
          const waktu2 = $(this).data('waktu2');
          const nilai = $(this).data('nilai');
          const siswa = $(this).data('siswa');

          // Set data to Form Edit
          $('.id_nilai').val(id);
          $('.siswa').val(siswa);
          $('.nama').val(nama);
          $('.alamat').val(alamat);
          $('.waktu1').val(waktu1);
          $('.waktu2').val(waktu2);
          $('.nilai').val(nilai);
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const id = $(this).data('id_nilai');
          // Set data to Form Edit
          $('.id_nilai').val(id);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <?= $this->endSection() ?>