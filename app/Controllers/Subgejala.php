<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSubgejala;

class Subgejala extends BaseController
{
    public function __construct()
    {
        $this->ModelSubgejala = new ModelSubgejala();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Kelola Gejala',
            'sub_gejala' => $this->ModelSubgejala->getAllData(),
            'gejala' => $this->ModelSubgejala->getAllGejala(),
        ];
        return view('admin/v_subgejala', $data);
    }

    public function addData()
    {
        $data = [
            'id_gejala' => $this->request->getPost('id_gejala'),
            'nama_sub_gejala' => $this->request->getPost('nama_sub_gejala'),
            'ket_sub_gejala' => $this->request->getPost('ket_sub_gejala'),
        ];
        $this->ModelSubgejala->addData($data);

        session()->setFlashdata('tambah', 'Data sub gejala berhasil ditambahkan');
        return redirect()->to(base_url('subgejala'));
    }

    public function editData($id_sub_gejala)
    {
        $data = [
            'id_gejala' => $this->request->getPost('id_gejala'),
            'nama_sub_gejala' => $this->request->getPost('nama_sub_gejala'),
            'ket_sub_gejala' => $this->request->getPost('ket_sub_gejala'),
        ];
        $this->ModelSubgejala->editData($data, $id_sub_gejala);
        
        session()->setFlashdata('edit', 'Data sub gejala berhasil diubah');
        return redirect()->to(base_url('subgejala'));
    }

    public function deleteData($id_sub_gejala)
    {
        $data = [
            'id_sub_gejala' => $id_sub_gejala
        ];
        $this->ModelSubgejala->deleteData($data);
        
        session()->setFlashdata('delete', 'Data sub gejala berhasil dihapus');
        return redirect()->to(base_url('subgejala'));
    }
}
