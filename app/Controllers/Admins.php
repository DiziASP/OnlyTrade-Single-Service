<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AdminModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Ramsey\Uuid\Uuid;

class Admins extends ResourceController
{
    use ResponseTrait;
    public function index() // GET /admins
    {
        $model = new AdminModel();
        $data = $model->findAll();
        $response = [
            'status'   => 200,
            'messages' => 'Admins retrieved successfully',
            'data'     => $data,
        ];
        return $this->respond($response);
    }

    // create
    public function create() // POST /admins
    {
        try {
            $model = new AdminModel();
            $data = [
                'id' => Uuid::uuid4(),
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'password' => md5($this->request->getVar('password')),
            ];
            $model->insert($data);
            $response = [
                'status'   => 201,
                'messages' => 'Admins added successfully',
                'data'     => $data,
            ];
            return $this->respondCreated($response);
        } catch (DatabaseException $e) {
            // Check if it's a duplicate entry error
            if (strpos($e->getMessage(), "Duplicate entry") !== false) {
                return $this->failResourceExists('Duplicate entry', 409);
            } else {
                // Handle other database-related errors
                return $this->failServerError('Server error');
            }
        }
    }

    // 
    public function show($id = null)
    {
        $model = new AdminModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            $response = [
                'status'   => 200,
                'messages' => 'Admins retrieved successfully',
                'data'     => [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email'  => $data['email'],
                ],
            ];
            return $this->respond($response, 200);
        } else {
            return $this->failNotFound('User Not found');
        }
    }

    // update
    public function update($id = null)
    {
        $model = new AdminModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'password' => md5($this->request->getVar('password')),
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'messages' => 'Admins updated successfully',
            'data'     => $data,
        ];
        return $this->respondUpdated($response);
    }

    // delete
    public function delete($id = null)
    {
        $model = new AdminModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'messages' => 'Admins deleted successfully',
                'data'     => $data,
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('User not found');
        }
    }
}
