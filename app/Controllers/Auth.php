<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
    }

    public function login4()
    {
        echo view('v_login_admin');
    }

    public function cek_login_admin()
    {
        if($this->validate([
            'username' => [
				'label' => 'Username',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib diisi'
				]
			],

			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib diisi'
				]
			]
        ])) {
            // valid
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->login_admin($username, $password);
            if ($cek_login) {
				session()->set('nama_admin', $cek_login['nama_admin']);
				session()->set('username', $cek_login['username']);

                session()->set('level', 'admin');
                
				return redirect()->to(base_url('admin1'));
			}
			else{
				session()->setFlashdata('pesan', 'Username atau password salah');
				return redirect()->to(base_url('auth/login4'));
			}
        } else {
            // tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('auth/login4');
        }
    }

    public function logout()
    {
        session()->remove('nama_user');
        session()->remove('username');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Logout berhasil');
        return redirect()->to(base_url('auth/login4'));
    }
}
