<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengguna;

class Pengguna extends BaseController
{
    public function __construct()
    {
        $this->ModelPengguna = new ModelPengguna();
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Kelola Pengguna',
            'pengguna' => $this->ModelPengguna->getAllData(),
        ];
        return view('admin/v_pengguna', $data);
    }

    public function deleteData($id_riwayat)
    {
        $data = [
            'id_riwayat' => $id_riwayat
        ];
        $this->ModelPengguna->deleteDataRiwayat($data);
        $this->ModelPengguna->deleteDataDeteksi($data);
        $this->ModelPengguna->deleteDataDeteksiString($data);
        
        session()->setFlashdata('delete', 'Data pengguna berhasil dihapus');
        return redirect()->to(base_url('pengguna'));
    }
}
