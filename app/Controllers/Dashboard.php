<?php

namespace App\Controllers;

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

        $response = $this->http_request($rest_api_base_url . $get_endpoint, null, null, "GET");
        $data = $response['data'];
        $perusahaanModel = new \App\Models\PerusahaanModel();

        // // Map perusahaan_id to perusahaan_name
        foreach ($data as $key => $value) {
            $perusahaan = $perusahaanModel->find($value['perusahaan_id']);
            $data[$key]['perusahaan_name'] = $perusahaan['nama'];
        }

        return view('barang_dashboard', ['data' => $data]);
    }

    public function perusahaan_dashboard(): string
    {
        // if enviroment is production, use base_url() else use docker base url 

        $rest_api_base_url = env('CI_ENVIRONMENT') == 'production' ? base_url() : env('DOCKER_BASE_URL');

        //GET - list of users
        $get_endpoint = '/api/perusahaan';

        $response = $this->http_request($rest_api_base_url . $get_endpoint, null, null, "GET");
        $data = $response['data'];
        return view('perusahaan_dashboard', ['data' => $data]);
    }

    function http_request($url, $data = null, $headers = null, $method = null)
    {
        $curl = curl_init();

        switch ($method) {
            case "GET":
                curl_setopt($curl, CURLOPT_HTTPGET, 1);
                break;
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");

                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);

        if ($headers) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);

        if (!$result) {
            die("Connection Failure");
        }

        curl_close($curl);

        return json_decode($result, true);
    }
}
