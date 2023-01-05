<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Sistem Pakar Diagnosa Awal Penyakit Hepatitis B',
            'subtitle' => 'Beranda Admin'
        ];
        return view('v_home', $data);
    }
}
