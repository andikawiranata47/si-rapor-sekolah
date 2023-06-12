<?= $this->extend('partials/template') ?>

<?= $this->section('content') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Halaman Siswa </h2>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-inline">Tabel Daftar Siswa</h4>
            <div class="float-right">
              <?php if (session()->getFlashdata('pesan')) : ?>
                <p class="card-description mr-3 text-success d-inline">
                  <?= session()->getFlashdata('pesan'); ?>
                </p>
              <?php endif; ?>
              <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Tambah</button>
            </div>

            <table class="table table-bordered table-responsive-sm">
              <thead>
                <tr>
                  <th> No </th>
                  <th> NISN </th>
                  <th> NIS </th>
                  <th> Nama </th>
                  <th> Fase </th>
                  <th> </th>
                  <!-- <th> Jenis Kelamin </th>
                  <th> Tempat Lahir </th>
                  <th> Tanggal Lahir </th>
                  <th> Agama </th>
                  <th> Alamat </th>
                  <th> Nomor Telepon Siswa </th>
                  <th> Sekolah Asal </th>
                  <th> Tahun Lulus </th>
                  <th> Nomor Ijazah </th>
                  <th> Diterima di Kelas </th>
                  <th> Diterima pada </th>
                  <th> Nama Ayah </th>
                  <th> Pekerjaan Ayah </th>
                  <th> Nama Ibu </th>
                  <th> Pekerjaan Ibu </th>
                  <th> Alamat Orang Tua </th>
                  <th> Nomor Telepon Orang Tua </th>
                  <th> Nama Wali </th>
                  <th> Alamat Wali </th>
                  <th> Nomor Telepon Wali </th>
                  <th> Pekerjaan Wali </th> -->
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($siswa as $s) : ?>
                  <tr>
                    <td class="number"> <?= $i++; ?> </td>
                    <td> <?= $s->NISN; ?> </td>
                    <td> <?= $s->NIS; ?> </td>
                    <td> <?= $s->Nama; ?> </td>
                    <td> <?= $s->Fase; ?> </td>
                    <td class="text-center">
                      <button type="button" class="btn btn-inverse-primary btn-icon btn-edit" data-toggle="modal" data-target="#editModal" data-id_siswa="<?= $s->Id_Siswa; ?>" data-nis="<?= $s->NIS; ?>" data-nisn="<?= $s->NISN; ?>" data-nama="<?= $s->Nama; ?>" data-fase="<?= $s->Fase; ?>">Edit</button>

                      <button type="button" class="btn btn-inverse-danger btn-icon btn-delete" data-toggle="modal" data-target="#hapusModal" data-id_siswa="<?= $s->Id_Siswa; ?>">Hapus</button>
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
    <form action="/Siswa/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Tambah Siswa</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>NIS</label>
                <input type="number" class="form-control" name="nis" placeholder="" required>
              </div>
              <div class="form-group">
                <label>NISN</label>
                <input type="number" class="form-control" name="nisn" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Fase</label>
                <select name="fase" class="form-control mr-2 pr-xl-5" id="">
                  <option value="">Fase</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  <option value="F">F</option>
                </select>
              </div>
              <!-- <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control " required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Agama</label>
                <input type="text" class="form-control" name="agama" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="number" class="form-control" name="telp" placeholder="">
              </div>
              <div class="form-group">
                <label>Sekolah Asal</label>
                <input type="text" class="form-control" name="sekolah_asal" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Tahun Lulus</label>
                <input type="number" class="form-control" name="tahun_lulus" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nomor Ijazah</label>
                <input type="text" class="form-control" name="nomor_lulus" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Diterima di Tingkat</label>
                <input type="text" class="form-control" name="diterima_tingkat" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Diterima pada Tanggal</label>
                <input type="date" class="form-control" name="diterima_tanggal" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nama Ayah</label>
                <input type="text" class="form-control" name="nama_ayah" placeholder="">
              </div>
              <div class="form-group">
                <label>Pekerjaan Ayah</label>
                <input type="text" class="form-control" name="kerja_ayah" placeholder="">
              </div>
              <div class="form-group">
                <label>Nama Ibu</label>
                <input type="text" class="form-control" name="nama_ibu" placeholder="">
              </div>
              <div class="form-group">
                <label>Pekerjaan Ibu</label>
                <input type="text" class="form-control" name="kerja_ibu" placeholder="">
              </div>
              <div class="form-group">
                <label>Alamat Orang Tua</label>
                <input type="text" class="form-control" name="alamat_ortu" placeholder="">
              </div>
              <div class="form-group">
                <label>Nomor Telepon Orang Tua</label>
                <input type="number" class="form-control" name="telp_ortu" placeholder="">
              </div>
              <div class="form-group">
                <label>Nama Wali</label>
                <input type="text" class="form-control" name="nama_wali" placeholder="">
              </div>
              <div class="form-group">
                <label>Pekerjaan Wali</label>
                <input type="text" class="form-control" name="kerja_wali" placeholder="">
              </div>
              <div class="form-group">
                <label>Alamat Wali</label>
                <input type="text" class="form-control" name="alamat_wali" placeholder="">
              </div>
              <div class="form-group">
                <label>Nomor Telepon Wali</label>
                <input type="number" class="form-control" name="telp_wali" placeholder="">
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
    <form action="/Siswa/edit/" method="post">
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
                <input type="number" class="form-control nis" name="nis" placeholder="" required>
              </div>
              <div class="form-group">
                <label>NISN</label>
                <input type="number" class="form-control nisn" name="nisn" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control nama" name="nama" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Fase</label>
                <select name="fase" class="form-control mr-2 pr-xl-5 fase" id="fase">
                  <option value="">Fase</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  <option value="F">F</option>
                </select>
              </div>

              <!-- <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control jenis_kelamin" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control tempat_lahir" name="tempat_lahir" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control tanggal_lahir" name="tanggal_lahir" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Agama</label>
                <input type="text" class="form-control agama" name="agama" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control alamat" name="alamat" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="number" class="form-control telp" name="telp" placeholder="">
              </div>
              <div class="form-group">
                <label>Sekolah Asal</label>
                <input type="text" class="form-control sekolah_asal" name="sekolah_asal" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Tahun Lulus</label>
                <input type="number" class="form-control tahun_lulus" name="tahun_lulus" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nomor Ijazah</label>
                <input type="text" class="form-control nomor_lulus" name="nomor_lulus" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Diterima di Tingkat</label>
                <input type="text" class="form-control diterima_tingkat" name="diterima_tingkat" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Diterima pada Tanggal</label>
                <input type="date" class="form-control diterima_tanggal" name="diterima_tanggal" placeholder="" required>
              </div>
              <div class="form-group">
                <label>Nama Ayah</label>
                <input type="text" class="form-control nama_ayah" name="nama_ayah" placeholder="">
              </div>
              <div class="form-group">
                <label>Pekerjaan Ayah</label>
                <input type="text" class="form-control kerja_ayah" name="kerja_ayah" placeholder="">
              </div>
              <div class="form-group">
                <label>Nama Ibu</label>
                <input type="text" class="form-control nama_ibu" name="nama_ibu" placeholder="">
              </div>
              <div class="form-group">
                <label>Pekerjaan Ibu</label>
                <input type="text" class="form-control kerja_ibu" name="kerja_ibu" placeholder="">
              </div>
              <div class="form-group">
                <label>Alamat Orang Tua</label>
                <input type="text" class="form-control alamat_ortu" name="alamat_ortu" placeholder="">
              </div>
              <div class="form-group">
                <label>Nomor Telepon Orang Tua</label>
                <input type="number" class="form-control telp_ortu" name="telp_ortu" placeholder="">
              </div>
              <div class="form-group">
                <label>Nama Wali</label>
                <input type="text" class="form-control nama_wali" name="nama_wali" placeholder="">
              </div>
              <div class="form-group">
                <label>Pekerjaan Wali</label>
                <input type="text" class="form-control kerja_wali" name="kerja_wali" placeholder="">
              </div>
              <div class="form-group">
                <label>Alamat Wali</label>
                <input type="text" class="form-control alamat_wali" name="alamat_wali" placeholder="">
              </div>
              <div class="form-group">
                <label>Nomor Telepon Wali</label>
                <input type="number" class="form-control telp_wali" name="telp_wali" placeholder="">
              </div> -->
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_siswa" class="id_siswa1">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End Modal Edit -->

    <!-- Modal Hapus -->
    <form action="/Siswa/delete/" method="post">
      <?= csrf_field(); ?>
      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_siswa" class="id_siswa2">
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
          const id_siswa = $(this).data('id_siswa');
          const nis = $(this).data('nis');
          const nisn = $(this).data('nisn');
          const nama = $(this).data('nama');
          const fase = $(this).data('fase');
          // const jenis_kelamin = $(this).data('jenis_kelamin');
          // const tempat_lahir = $(this).data('tempat_lahir');
          // const tanggal_lahir = $(this).data('tanggal_lahir');
          // const agama = $(this).data('agama');
          // const alamat = $(this).data('alamat');
          // const telp = $(this).data('telp');
          // const sekolah_asal = $(this).data('sekolah_asal');
          // const tahun_lulus = $(this).data('tahun_lulus');
          // const nomor_lulus = $(this).data('nomor_lulus');
          // const diterima_tingkat = $(this).data('diterima_tingkat');
          // const diterima_tanggal = $(this).data('diterima_tanggal');
          // const nama_ayah = $(this).data('nama_ayah');
          // const kerja_ayah = $(this).data('kerja_ayah');
          // const nama_ibu = $(this).data('nama_ibu');
          // const kerja_ibu = $(this).data('kerja_ibu');
          // const alamat_ortu = $(this).data('alamat_ortu');
          // const telp_ortu = $(this).data('telp_ortu');
          // const nama_wali = $(this).data('nama_wali');
          // const alamat_wali = $(this).data('alamat_wali');
          // const telp_wali = $(this).data('telp_wali');
          // const kerja_wali = $(this).data('kerja_wali');

          // Set data to Form Edit
          $('.id_siswa1').val(id_siswa);
          $('.nis').val(nis);
          $('.nisn').val(nisn);
          $('.nama').val(nama);
          $('.fase').val(fase);
          // $('.jenis_kelamin').val(jenis_kelamin);
          // $('.tempat_lahir').val(tempat_lahir);
          // $('.tanggal_lahir').val(tanggal_lahir);
          // $('.agama').val(agama);
          // $('.alamat').val(alamat);
          // $('.telp').val(telp);
          // $('.sekolah_asal').val(sekolah_asal);
          // $('.tahun_lulus').val(tahun_lulus);
          // $('.nomor_lulus').val(nomor_lulus);
          // $('.diterima_tingkat').val(diterima_tingkat);
          // $('.diterima_tanggal').val(diterima_tanggal);
          // $('.nama_ayah').val(nama_ayah);
          // $('.kerja_ayah').val(kerja_ayah);
          // $('.nama_ibu').val(nama_ibu);
          // $('.kerja_ibu').val(kerja_ibu);
          // $('.alamat_ortu').val(alamat_ortu);
          // $('.telp_ortu').val(telp_ortu);
          // $('.nama_wali').val(nama_wali);
          // $('.alamat_wali').val(alamat_wali);
          // $('.telp_wali').val(telp_wali);
          // $('.kerja_wali').val(kerja_wali);
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const id_siswa = $(this).data('id_siswa');
          // Set data to Form Edit
          $('.id_siswa2').val(id_siswa);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>

    <?= $this->endSection() ?>