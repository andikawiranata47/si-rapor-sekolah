<?php

namespace App\Controllers;

use App\Models\RaporModel;
use App\Models\KelasModel;
use App\Models\GeneralModel;
use App\Models\MasterUserModel;

use \Dompdf\Dompdf;
use \Dompdf\Options;

class Rapor extends BaseController
{
  protected $raporModel, $kelasModel, $generalModel, $dompdf, $userModel;
  public function __construct()
  {
    $this->raporModel = new RaporModel();
    $this->kelasModel = new KelasModel();
    $this->generalModel = new GeneralModel();
    $this->dompdf = new Dompdf();
    $this->userModel = new MasterUserModel();



    // $options = new Options();
    // $options->set('isRemoteEnabled', TRUE);
    // $this->dompdf = new Dompdf($options);
    // $contxt = stream_context_create([
    //   'ssl' => [
    //     'verify_peer' => FALSE,
    //     'verify_peer_name' => FALSE,
    //     'allow_self_signed' => TRUE
    //   ]
    // ]);
    // $this->dompdf->setHttpContext($contxt);
  }

  public function index()
  {

    $wali = session()->get('id_user');
    $id = $this->request->getPost('pilih_siswa');
    $semester = $this->request->getPost('pilih_semester');
    $tahun = $this->request->getPost('pilih_tahun');

    $rapor1 = $this->raporModel->getRaporMapel($wali, $id, $semester, $tahun)->getResult();
    $rapor2 = $this->raporModel->getRaporPrakerin($wali, $id, $semester, $tahun)->getResult();
    $rapor3 = $this->raporModel->getRaporEkstra($wali, $id, $semester, $tahun)->getResult();
    $rapor4 = $this->raporModel->getRaporKepribadian($wali, $id, $semester, $tahun)->getResult();

    $valid = $this->raporModel->getValid2()->getResult();

    $siswa = $this->raporModel->pilihSiswa($wali)->getResult();
    $general = $this->generalModel->getGeneral()->getResult();
    $data = [
      'judul' => 'Rapor',
      'raporMapel' => $rapor1,
      'raporPrakerin' => $rapor2,
      'raporEkstra' => $rapor3,
      'raporKepribadian' => $rapor4,
      'siswa' => $siswa,
      'id'    => $id,
      'general'    => $general,
      'valid'    => $valid
    ];
    return view('pages/rapor', $data);
  }

  public function get()
  {

    $wali = session()->get('id_user');
    $id = $this->request->getPost('pilih_siswa');
    $semester = $this->request->getPost('pilih_semester');
    $tahun = $this->request->getPost('pilih_tahun');

    $rapor1 = $this->raporModel->getRaporMapel($wali, $id, $semester, $tahun)->getResult();
    $rapor2 = $this->raporModel->getRaporPrakerin($wali, $id, $semester, $tahun)->getResult();
    $rapor3 = $this->raporModel->getRaporEkstra($wali, $id, $semester, $tahun)->getResult();
    $rapor4 = $this->raporModel->getRaporKepribadian($wali, $id, $semester, $tahun)->getResult();

    $valid = $this->raporModel->getValid2()->getResult();

    $siswa = $this->raporModel->pilihSiswa($wali)->getResult();
    $general = $this->generalModel->getGeneral()->getResult();
    $data = [
      'judul' => 'Rapor',
      'raporMapel' => $rapor1,
      'raporPrakerin' => $rapor2,
      'raporEkstra' => $rapor3,
      'raporKepribadian' => $rapor4,
      'siswa' => $siswa,
      'id'    => $id,
      'general'    => $general,
      'valid'    => $valid
    ];
    session()->set('wali_kelas', session()->get('id_user'));
    session()->set('id', $this->request->getPost('pilih_siswa'));
    session()->set('semester', $this->request->getPost('pilih_semester'));
    session()->set('tahun', $this->request->getPost('pilih_tahun'));
    return view('pages/rapor', $data);
  }

  public function printpdf()
  {
    $wali = session()->get('wali_kelas');
    $id = session()->get('id');
    $semester = session()->get('semester');
    $tahun = session()->get('tahun');

    $catatan = $this->request->getPost('catatan');
    $keputusan = $this->request->getPost('keputusan');
    $nama_siswa = $this->request->getPost('nama_siswa');

    $rapor1 = $this->raporModel->getRaporMapel($wali, $id, $semester, $tahun)->getResult();
    $rapor2 = $this->raporModel->getRaporPrakerin($wali, $id, $semester, $tahun)->getResult();
    $rapor3 = $this->raporModel->getRaporEkstra($wali, $id, $semester, $tahun)->getResult();
    $rapor4 = $this->raporModel->getRaporKepribadian($wali, $id, $semester, $tahun)->getResult();

    $siswa = $this->raporModel->pilihSiswa($wali)->getResult();
    $general = $this->generalModel->getGeneral()->getResult();
    $data = [
      'judul' => 'Rapor',
      'raporMapel' => $rapor1,
      'raporPrakerin' => $rapor2,
      'raporEkstra' => $rapor3,
      'raporKepribadian' => $rapor4,
      'siswa' => $siswa,
      'id'    => $id,
      'general'    => $general,
      'catatan'    => $catatan,
      'keputusan'    => $keputusan,
      'user' => $this->userModel->getUser()->getResult()
    ];
    $html =  view('pages/print_rapor', $data);
    $this->dompdf->loadHtml($html);
    // $this->dompdf->set_option('isRemoteEnabled', TRUE);
    $this->dompdf->setPaper('A4', 'portrait');
    $this->dompdf->render();
    $this->dompdf->stream("rapor $nama_siswa.pdf", array(
      "Attachment" => false
    ));
  }

  public function validasi()
  {
    $id = session()->get('id');
    $semester = session()->get('semester');
    $tahun = session()->get('tahun');
    $data = [
      'semester' => $semester,
      'tahun_ajaran' => $tahun,
      'id_siswa' => $id
    ];
    $this->raporModel->addValid($data);
    session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    return redirect()->to('/rapor/get');
  }
}
