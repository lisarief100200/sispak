<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSolusi extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_solusi')
            ->join('tbl_penyakit', 'tbl_penyakit.id_penyakit = tbl_solusi.id_penyakit', 'left')
            ->orderBy('tbl_solusi.id_solusi', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getCountPenyakit1()
    {
        return $this->db->table('tbl_riwayat')
            ->where('id_penyakit', 1)
            ->countAllResults();
    }

    public function getCountPenyakit2()
    {
        return $this->db->table('tbl_riwayat')
            ->where('id_penyakit', 2)
            ->countAllResults();
    }

    public function getCountPenyakit3()
    {
        return $this->db->table('tbl_riwayat')
            ->where('id_penyakit', 3)
            ->countAllResults();
    }

    public function addData($data)
    {
        $this->db->table('tbl_solusi')->insert($data);
    }

    public function editData($data, $id_solusi)
    {
        $this->db->table('tbl_solusi')
            ->WHERE('id_solusi', $id_solusi)
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_solusi')
            ->WHERE('id_solusi', $data['id_solusi'])
            ->delete($data);
    }

    public function getSaranPenyakit($id_penyakit)
    {
        return $this->db->table('tbl_solusi')
            ->where('id_penyakit', $id_penyakit)
            ->get()
            ->getResultArray(); // Satu baris aja
    }

    // penyakit numpang di solusi
    public function getAllDataPenyakit()
    {
        return $this->db->table('tbl_penyakit')
        ->orderBy('tbl_penyakit.id_penyakit', 'ASC')
        ->get()
        ->getResultArray();
    }
}