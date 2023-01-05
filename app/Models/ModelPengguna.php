<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengguna extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_riwayat')
            ->join('tbl_solusi', 'tbl_solusi.id_penyakit = tbl_riwayat.id_penyakit', 'left')
            ->orderBy('tanggal', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function deleteDataRiwayat($data)
    {
        $this->db->table('tbl_riwayat')
            ->WHERE('id_riwayat', $data['id_riwayat'])
            ->delete($data);
    }

    public function deleteDataDeteksi($data)
    {
        $this->db->table('tbl_deteksi')
        ->WHERE('id_riwayat', $data['id_riwayat'])
            ->delete($data);
    }

    public function deleteDataDeteksiString($data)
    {
        $this->db->table('tbl_deteksi_string')
        ->WHERE('id_riwayat', $data['id_riwayat'])
            ->delete($data);
    }
}