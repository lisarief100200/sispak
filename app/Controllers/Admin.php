<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSolusi;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelSolusi = new ModelSolusi();
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Beranda Admin',
            'total_penyakit1' => $this->ModelSolusi->getCountPenyakit1(),
            'total_penyakit2' => $this->ModelSolusi->getCountPenyakit2(),
            'total_penyakit3' => $this->ModelSolusi->getCountPenyakit3(),
        ];
        return view('admin/v_dashboard', $data);
    }
}