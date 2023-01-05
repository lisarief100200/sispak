<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSolusi;

class Solusi extends BaseController
{
    public function __construct()
    {
        $this->ModelSolusi = new ModelSolusi();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Kelola Solusi',
            'solusi' => $this->ModelSolusi->getAllData(),
            'solusi_untuk_penyakit' => $this->ModelSolusi->getAllDataPenyakit(),
        ];
        return view('admin/v_solusi', $data);
    }

    public function addData()
    {
        $data = [
            'id_penyakit' => $this->request->getPost('id_penyakit'),
            'deskripsi_solusi' => $this->request->getPost('deskripsi_solusi'),
        ];
        $this->ModelSolusi->addData($data);

        session()->setFlashdata('tambah', 'Data solusi berhasil ditambahkan');
        return redirect()->to(base_url('solusi'));
    }

    public function editData($id_solusi)
    {
        $data = [
            'id_penyakit' => $this->request->getPost('id_penyakit'),
            'deskripsi_solusi' => $this->request->getPost('deskripsi_solusi'),
        ];
        $this->ModelSolusi->editData($data, $id_solusi);
        
        session()->setFlashdata('edit', 'Data solusi berhasil diubah');
        return redirect()->to(base_url('solusi'));
    }

    public function deleteData($id_solusi)
    {
        $data = [
            'id_solusi' => $id_solusi
        ];
        $this->ModelSolusi->deleteData($data);
        
        session()->setFlashdata('delete', 'Data solusi berhasil dihapus');
        return redirect()->to(base_url('solusi'));
    }
}
