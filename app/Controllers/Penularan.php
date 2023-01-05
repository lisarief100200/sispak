<?php

namespace App\Controllers;

class Penularan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Beranda Admin'
        ];
        return view('v_penularan', $data);
    }
}
