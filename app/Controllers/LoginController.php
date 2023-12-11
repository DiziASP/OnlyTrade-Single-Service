<?php

namespace App\Controllers;

use App\Models\Login;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login_action()
    {
        $model = model(Login::class);
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password'); // Hapus tanda kurung yang tidak perlu
        $cek = $model->getDataUsers($email, $password);

        if ($cek == 1) {
            session()->set('num_user', $cek);
            return redirect()->to('/');
        } elseif ($cek == 0) {
            // Email atau kata sandi salah
            return redirect()->to('/login')->with('error', 'Email atau kata sandi salah. Silakan coba lagi.');
        } else {
            // Email belum terdaftar
            return redirect()->to('/login')->with('error', 'Email belum terdaftar. Silakan daftar terlebih dahulu.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
