<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGejala extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_gejala')
            ->orderBy('id_gejala', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function addData($data)
    {
        $this->db->table('tbl_gejala')->insert($data);
    }

    public function editData($data, $id_gejala)
    {
        $this->db->table('tbl_gejala')
            ->WHERE('id_gejala', $id_gejala)
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_gejala')
            ->WHERE('id_gejala', $data['id_gejala'])
            ->delete($data);
    }
}