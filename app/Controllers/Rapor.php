<?php

namespace App\Controllers;

use App\Models\RaporModel;
use App\Models\KelasModel;
use App\Models\GeneralModel;

use \Dompdf\Dompdf;

class Rapor extends BaseController
{
  protected $raporModel, $kelasModel, $generalModel, $dompdf;
  public function __construct()
  {
    $this->raporModel = new RaporModel();
    $this->kelasModel = new KelasModel();
    $this->generalModel = new GeneralModel();
    $this->dompdf = new Dompdf();
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
      'general'    => $general
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
      'general'    => $general
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
      'general'    => $general
    ];
    $html =  view('pages/print_rapor', $data);
    $this->dompdf->loadHtml($html);
    $this->dompdf->setPaper('A4', 'portrait');
    $this->dompdf->render();
    $this->dompdf->stream('rapor siswa.pdf', array(
      "Attachment" => false
    ));
  }
}
