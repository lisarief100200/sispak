<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeputusan extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_keputusan')
            ->orderBy('id_keputusan', 'ASC')
            ->get()
            ->getResultArray();
    }
}
