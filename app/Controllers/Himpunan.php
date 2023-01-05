<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelHimpunan;
use App\Models\ModelGejala;

class Himpunan extends BaseController
{
    public function __construct()
    {
        $this->ModelHimpunan = new ModelHimpunan();
        $this->ModelGejala = new ModelGejala();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Kelola Himpunan',
            'himpunan' => $this->ModelHimpunan->getAllData(),
            'gejala' => $this->ModelGejala->getAllData(),
        ];
        return view('admin/v_himpunan', $data);
    }

    public function addData()
    {
        $data = [
            'id_gejala' => $this->request->getPost('id_gejala'),
            'nama_himpunan' => $this->request->getPost('nama_himpunan'),
            'batas_bawah_himpunan' => $this->request->getPost('batas_bawah_himpunan'),
            'batas_tengah_himpunan' => $this->request->getPost('batas_tengah_himpunan'),
            'batas_atas_himpunan' => $this->request->getPost('batas_atas_himpunan'),
        ];
        $this->ModelHimpunan->addData($data);

        session()->setFlashdata('tambah', 'Data himpunan berhasil ditambahkan');
        return redirect()->to(base_url('himpunan'));
    }

    public function editData($id_himpunan)
    {
        $data = [
            'id_gejala' => $this->request->getPost('id_gejala'),
            'nama_himpunan' => $this->request->getPost('nama_himpunan'),
            'batas_bawah_himpunan' => $this->request->getPost('batas_bawah_himpunan'),
            'batas_tengah_himpunan' => $this->request->getPost('batas_tengah_himpunan'),
            'batas_atas_himpunan' => $this->request->getPost('batas_atas_himpunan'),
        ];
        $this->ModelHimpunan->editData($data, $id_himpunan);
        
        session()->setFlashdata('edit', 'Data himpunan berhasil diubah');
        return redirect()->to(base_url('himpunan'));
    }

    public function deleteData($id_himpunan)
    {
        $data = [
            'id_himpunan' => $id_himpunan
        ];
        $this->ModelHimpunan->deleteData($data);
        
        session()->setFlashdata('delete', 'Data himpunan berhasil dihapus');
        return redirect()->to(base_url('himpunan'));
    }
}