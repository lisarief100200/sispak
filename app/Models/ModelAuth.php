<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function login_admin($username, $password)
    {
        return $this->db->table('tbl_admin')->where(
            [
                'username' => $username,
                'password' => $password
            ]
        )->get()->getRowArray();
    }
}
