<?php

namespace App\Controllers;

use App\Models\Register;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function register_action()
    {
        $model = new Register(); // 
        $data = [
            'email' => $this->request->getPost('email'),
            'name' => $this->request->getPost('name'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // Proses logika registrasi
        $result = $model->registerUser($data);

        if ($result) {
            // Registrasi berhasil, redirect ke halaman lain jika diperlukan
            return redirect()->to('/');
        } else {
            // Registrasi gagal, redirect kembali ke halaman registrasi
            return redirect()->to('/register');
        }
    }
}
