<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAturan;
use App\Models\ModelGejala;
use App\Models\ModelKeputusan;
use App\Models\ModelHimpunan;

class Aturan extends BaseController
{
    public function __construct()
    {
        $this->ModelAturan = new ModelAturan();
        $this->ModelGejala = new ModelGejala();
        $this->ModelKeputusan = new ModelKeputusan();
        $this->ModelHimpunan = new ModelHimpunan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Kelola Aturan',
            'keputusan' => $this->ModelKeputusan->getAllData(),
            'aturan' => $this->ModelAturan->getAllData(),
        ];

        // Buat menampilkan semua data aturan
        foreach ($data['aturan'] as $key => $value) {
            $id_aturan = $value['id_aturan'];
            $detail_aturan = $this->ModelAturan->getDetailAturan($id_aturan);

            foreach ($detail_aturan as $detail_key => $detail_value) {
                $additional[$detail_key] = $detail_value['nama_gejala'] . " " . $detail_value['nama_himpunan'] . " AND";
            }

            $combine = implode(" ", $additional);
            $data['aturan'][$key]['detail'] = mb_substr($combine, 0, -4);
        }

        // Buat Tambah Data, tampil semua himpunan
        $gejala1 = $this->ModelGejala->getAllData();
        foreach ($gejala1 as $key => $value) {
            $data['himpunan'][$value['id_gejala']]['nama_gejala1'] = $value['nama_gejala'];
            $data['himpunan'][$value['id_gejala']]['nama_himpunan1'] = $this->ModelHimpunan->getHimpunan($value['id_gejala']);
        }

        //echo view('admin/v_aturan', $data);
        return view('admin/v_aturan', $data);
    }

    public function addData()
    {
        $data = [
            'nama_aturan' => $this->request->getPost('nama_aturan'),
            'id_keputusan' => $this->request->getPost('id_keputusan'),
            'id_himpunan' => $this->request->getPost('id_himpunan'),
        ];

        $this->ModelAturan->addData($data);
        session()->setFlashdata('tambah', 'Data aturan berhasil ditambah.');
		return redirect()->to(base_url('aturan'));
    }

    public function editData($id_aturan)
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Edit Aturan',
            'keputusan' => $this->ModelKeputusan->getAllData(),
        ];

        // Buat Tambah Data, tampil semua himpunan
        $gejala1 = $this->ModelGejala->getAllData();
        foreach ($gejala1 as $key => $value) {
            $data['himpunan'][$value['id_gejala']]['nama_gejala1'] = $value['nama_gejala'];
            $data['himpunan'][$value['id_gejala']]['nama_himpunan1'] = $this->ModelHimpunan->getHimpunan($value['id_gejala']);
        }

        $data['aturan'] = $this->ModelAturan->getAturan($id_aturan);
        $data_detail = $this->ModelAturan->getDetailAturan($id_aturan);
        foreach ($data_detail as $key => $value) {
            $data['detail1'][$value['id_gejala']] = $value['id_himpunan'];
        }

        return view('admin/v_aturan_edit', $data);
    }

    public function simpanEditData($id_aturan)
    {
        $data = [
            'nama_aturan' => $this->request->getPost('nama_aturan'),
            'id_keputusan' => $this->request->getPost('id_keputusan'),
            'id_himpunan' => $this->request->getPost('id_himpunan'),
        ];
        
        $this->ModelAturan->editData($data, $id_aturan);
        
        session()->setFlashdata('edit', 'Data himpunan berhasil diubah');
        return redirect()->to(base_url('aturan'));
    }

    public function deleteData($id_aturan)
    {
        $data = [
            'id_aturan' => $id_aturan
        ];
        $this->ModelAturan->deleteData($data);
        
        session()->setFlashdata('delete', 'Data aturan berhasil dihapus');
        return redirect()->to(base_url('aturan'));
    }
}
