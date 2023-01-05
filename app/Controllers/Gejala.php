<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGejala;

class Gejala extends BaseController
{
    public function __construct()
    {
        $this->ModelGejala = new ModelGejala();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Kelola Gejala',
            'gejala' => $this->ModelGejala->getAllData(),
        ];
        return view('admin/v_gejala', $data);
    }

    public function addData()
    {
        $data = [
            'nama_gejala' => $this->request->getPost('nama_gejala'),
            'pertanyaan_gejala' => $this->request->getPost('pertanyaan_gejala'),
            'type_gejala' => $this->request->getPost('type_gejala'),
        ];
        $this->ModelGejala->addData($data);

        session()->setFlashdata('tambah', 'Data gejala berhasil ditambahkan');
        return redirect()->to(base_url('gejala'));
    }

    public function editData($id_gejala)
    {
        $data = [
            'nama_gejala' => $this->request->getPost('nama_gejala'),
            'pertanyaan_gejala' => $this->request->getPost('pertanyaan_gejala'),
            'type_gejala' => $this->request->getPost('type_gejala'),
        ];
        $this->ModelGejala->editData($data, $id_gejala);
        
        session()->setFlashdata('edit', 'Data gejala berhasil diubah');
        return redirect()->to(base_url('gejala'));
    }

    public function deleteData($id_gejala)
    {
        $data = [
            'id_gejala' => $id_gejala
        ];
        $this->ModelGejala->deleteData($data);
        
        session()->setFlashdata('delete', 'Data gejala berhasil dihapus');
        return redirect()->to(base_url('gejala'));
    }
}
