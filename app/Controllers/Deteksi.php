<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGejala;
use App\Models\ModelHimpunan;
use App\Models\ModelDeteksi;
use App\Models\ModelSolusi;
use App\Models\ModelSubgejala;

class Deteksi extends BaseController
{
    public function __construct()
    {
        $this->ModelGejala = new ModelGejala();
        $this->ModelHimpunan = new ModelHimpunan();
        $this->ModelDeteksi = new ModelDeteksi();
        $this->ModelSolusi = new ModelSolusi();
        $this->ModelSubgejala = new ModelSubgejala();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Halaman Diagnosa',
            'gejala' => $this->ModelGejala->getAllData(),
            'subgejala' => $this->ModelSubgejala->getAllData(),
            'subgejalaPerut' => $this->ModelSubgejala->getAllDataPerut(),
            'subgejalaFlu' => $this->ModelSubgejala->getAllDataFlu(),
        ];

        foreach ($data['gejala'] as $key => $value) {
			$data['himpunan'][$value['id_gejala']] = $this->ModelHimpunan->getHimpunan($value['id_gejala']);
		}

        return view('v_deteksi', $data);
    }

    public function addData()
    {
        $cpt = $this->request->getPost('cpt');
        $rescpt = $this->request->getPost('rescpt');
        if ($cpt != $rescpt){
            session()->setFlashdata('msgcaptcha', 'Captcha belum tepat, silakan ulangi lagi');
            return redirect()->to(base_url('deteksi'));
        } else {
            $dataPerut = $this->request->getPost('sub_gejalaPerut');
            //echo var_dump($dataPerut) . "<br>";
            //echo count($dataPerut) . "<br>";
            if ($dataPerut == null) {
                $jmldataPerut = 0;
                $stringdataPerut = "Tidak ada";
            } else {
                $jmldataPerut = strval(count($dataPerut));
                $stringdataPerut = implode(', ',$dataPerut);
                //echo $stringdataPerut . "<br>";
            }
    
            $dataFlu = $this->request->getPost('sub_gejalaFlu');
            //echo var_dump($dataFlu) . "<br>";
            //echo count($dataFlu) . "<br>";
            if ($dataFlu == null) {
                $jmldataFlu = 0;
                $stringdataFlu = "Tidak ada";
            } else {
                $jmldataFlu = strval(count($dataFlu));
                $stringdataFlu = implode(', ',$dataFlu);
                //echo $stringdataPerut . "<br>";
            }
    
            $dataMata = $this->request->getPost('sub_gejalaMata');
            foreach($dataMata as $mata){
                //echo $mata . "<br>";
            }
            $jmldataMata = trim($mata);
            if ($jmldataMata == 1) {
                $stringdataMata = "Kuning";
            } else {
                $stringdataMata = "Normal";
            }
            //echo $stringdataMata . "<br>";
    
            $dataKulit = $this->request->getPost('sub_gejalaKulit');
            foreach($dataKulit as $kulit){
                //echo $kulit . "<br>";
            }
            $jmldataKulit = trim($kulit);
            if ($jmldataKulit == 1) {
                $stringdataKulit = "Kuning";
            } else {
                $stringdataKulit = "Normal";
            }
            //echo $stringdataKulit . "<br>";
    
            $dataSendi = $this->request->getPost('sub_gejalaSendi');
            foreach($dataSendi as $sendi){
                //echo $sendi . "<br>";
            }
            $jmldataSendi = trim($sendi);
            if ($jmldataSendi == 1) {
                $stringdataSendi = "Nyeri";
            } else {
                $stringdataSendi = "Normal";
            }
            //echo $stringdataSendi . "<br>";
    
            $inputGejala = array($jmldataPerut, $jmldataFlu, $jmldataMata, $jmldataKulit, $jmldataSendi);
            $inputGejalaSTR = array($stringdataPerut, $stringdataFlu, $stringdataMata, $stringdataKulit, $stringdataSendi);
            //echo var_dump($inputGejalaSTR);
    
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                'cpt' => $this->request->getPost('cpt'),
                'rescpt' => $this->request->getPost('rescpt'),
                'nama' => $this->request->getPost('nama'),
                'umur' => $this->request->getPost('umur'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'domisili' => $this->request->getPost('domisili'),
                'id_gejala' => $inputGejala,
                'id_gejala_string' => $inputGejalaSTR,
                'tanggal' => date("Y-m-d H:i:s"),
                'kode_deteksi' => $this->request->getPost('kode_deteksi'),
            ];

            $id_riwayat = $this->ModelDeteksi->addData($data);

            session()->set('id_riwayat', $id_riwayat);
            session()->set('level', 'pengguna');
    
            //echo var_dump($dataKulit);
            return redirect()->to(base_url('deteksi/hasilDeteksi/' . $id_riwayat));
        }
    }

    public function hasilDeteksi($id_riwayat)
    {
        if (session()->get('id_riwayat') == $id_riwayat) {
            $data = [
                'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
                'subtitle' => 'Hasil Diagnosa Awal',
                'data' => $this->ModelDeteksi->getDataDiri($id_riwayat),
                'hasil' => $this->ModelDeteksi->hitungHasil($id_riwayat),
                'pilihanInput' => $this->ModelDeteksi->getHasil($id_riwayat),
                'gejala' => $this->ModelGejala->getAllData()
            ];
    
            $data['solusi'] = $this->ModelSolusi->getSaranPenyakit($data['hasil']['id_penyakit']);
            
            foreach ($data['gejala'] as $key => $value) {
                $data['himpunan'][$value['id_gejala']] = $this->ModelHimpunan->getHimpunan($value['id_gejala']);
            }
    
            return view('v_hasil_deteksi', $data);   
        }
        else{
            return redirect()->to(base_url());
        }
    }
}
