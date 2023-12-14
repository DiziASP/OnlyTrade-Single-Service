<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('dashboard');
    }

    public function barang_dashboard(): string
    {
        return view('barang_dashboard');
    }

    public function perusahaan_dashboard(): string
    {
        return view('perusahaan_dashboard');
    }
}
