<?php

namespace App\Controllers;

helper('http');
class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('dashboard');
    }

    public function barang_dashboard()
    {
        $rest_api_base_url = env('CI_ENVIRONMENT') == 'production' ? base_url() : env('DOCKER_BASE_URL');

        //GET - list of users
        $get_endpoint = '/api/barang';

        $response = http_request($rest_api_base_url . $get_endpoint, null, null, "GET");
        $data = $response['data'];
        $perusahaanModel = new \App\Models\PerusahaanModel();

        // // Map perusahaan_id to perusahaan_name
        foreach ($data as $key => $value) {
            $perusahaan = $perusahaanModel->find($value['perusahaan_id']);
            $data[$key]['perusahaan_name'] = $perusahaan['nama'];
        }

        return view('barang_dashboard', ['data' => $data]);
    }

    public function barang_add()
    {
        $perusahaanModel = new \App\Models\PerusahaanModel();
        $data = $perusahaanModel->findAll();

        return view('barang_add', ['perusahaan' => $data]);
    }

    public function barang_edit($id = null)
    {
        $barangModel = new \App\Models\BarangModel();
        $data = $barangModel->find($id);

        $perusahaanModel = new \App\Models\PerusahaanModel();
        $perusahaan = $perusahaanModel->findAll();
        return view('barang_edit', ['data' => $data, 'perusahaan' => $perusahaan]);
    }

    public function perusahaan_dashboard(): string
    {
        // if enviroment is production, use base_url() else use docker base url 

        $rest_api_base_url = env('CI_ENVIRONMENT') == 'production' ? base_url() : env('DOCKER_BASE_URL');

        //GET - list of users
        $get_endpoint = '/api/perusahaan';

        $response = http_request($rest_api_base_url . $get_endpoint, null, null, "GET");
        $data = $response['data'];
        return view('perusahaan_dashboard', ['data' => $data]);
    }

    public function perusahaan_add()
    {
        return view('perusahaan_add');
    }

    public function perusahaan_edit($id = null)
    {
        $perusahaanModel = new \App\Models\PerusahaanModel();
        $data = $perusahaanModel->find($id);
        return view('perusahaan_edit', ['data' => $data]);
    }
}
