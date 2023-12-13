<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AdminModel;
use \Firebase\JWT\JWT;

class Auth extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return $this->respond(['status' => 200, 'message' => 'This is login page']);
    }

    public function register()
    {
        return $this->respond(['status' => 200, 'message' => 'This is register page']);
    }

    public function loginAction()
    {
        $userModel = new AdminModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if (is_null($user)) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }

        $pwd_verify = md5($password) == $user['password'];

        if (!$pwd_verify) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }

        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + 3600;

        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "email" => $user['email'],
        );

        $token = JWT::encode($payload, $key, 'HS256');

        $response = [
            'status'   => 200,
            'messages' => 'Login successfully',
            'data'     => [
                'token' => $token,
                'email' => $user['email'],
            ],
        ];

        return $this->respond($response, 200);
    }

    public function registerAction()
    {
        $rules = [
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[admins.email]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            'confirm_password'  => ['label' => 'confirm password', 'rules' => 'matches[password]']
        ];


        if ($this->validate($rules)) {
            $model = new AdminModel();
            $data = [
                'name'    => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => md5($this->request->getVar('password'))
            ];
            $model->save($data);

            return $this->respond([
                'status'   => 200,
                'messages' => 'Register successfully',
                'data'     => $data,
            ], 200);
        } else {
            // If email already exist
            return $this->respond([
                'status'   => 400,
                'messages' => $this->validator->getErrors(),
            ], 400);
        }
    }

    public function logoutAction()
    {
        session()->destroy();
        return $this->respond([
            'status'   => 200,
            'messages' => 'Logout successfully',
        ], 200);
    }
}
