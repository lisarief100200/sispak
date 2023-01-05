<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHimpunan extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_himpunan')
            ->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_himpunan.id_gejala', 'left')
            ->orderBy('tbl_himpunan.id_himpunan', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function addData($data)
    {
        $this->db->table('tbl_himpunan')->insert($data);
    }

    public function editData($data, $id_himpunan)
    {
        $this->db->table('tbl_himpunan')
            ->WHERE('id_himpunan', $id_himpunan)
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_himpunan')
            ->WHERE('id_himpunan', $data['id_himpunan'])
            ->delete($data);
    }

    public function getHimpunan($id_gejala)
    {
        return $this->db->table('tbl_himpunan')
            ->WHERE('id_gejala', $id_gejala)
            ->get()
            ->getResultArray();
    }

    public function getDetailHimpunan($id_himpunan)
    {
        return $this->db->table('tbl_himpunan')
            ->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_himpunan.id_gejala', 'left')
            ->where('id_himpunan', $id_himpunan)
            ->get()
            ->getRowArray(); // Satu baris aja
    }
}
