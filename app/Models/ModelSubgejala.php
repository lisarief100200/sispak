<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSubgejala extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_sub_gejala')
            ->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_sub_gejala.id_gejala', 'left')
            ->orderBy('tbl_gejala.id_gejala', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getAllDataPerut()
    {
        return $this->db->table('tbl_sub_gejala')
            ->where('id_gejala', 0)
            ->get()
            ->getResultArray();
    }

    public function getAllDataFlu()
    {
        return $this->db->table('tbl_sub_gejala')
            ->where('id_gejala', 1)
            ->get()
            ->getResultArray();
    }

    public function getAllGejala()
    {
        return $this->db->table('tbl_gejala')
            ->orderBy('id_gejala', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function addData($data)
    {
        $this->db->table('tbl_sub_gejala')->insert($data);
    }

    public function editData($data, $id_sub_gejala)
    {
        $this->db->table('tbl_sub_gejala')
            ->WHERE('id_sub_gejala', $id_sub_gejala)
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_sub_gejala')
            ->WHERE('id_sub_gejala', $data['id_sub_gejala'])
            ->delete($data);
    }
}
