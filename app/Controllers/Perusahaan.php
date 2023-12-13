<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PerusahaanModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Ramsey\Uuid\Uuid;

class Perusahaan extends ResourceController
{
    use ResponseTrait;

    public function index() // GET /perusahaan
    {
        $model = new PerusahaanModel();
        $data = $model->orderBy('id', 'DESC')->findAll();
        $response = [
            'status'   => 200,
            'messages' => 'Items retrieved successfully',
            'data'     => $data,
        ];
        return $this->respond($response);
    }

    public function create() // POST /perusahaan
    {
        $model = new PerusahaanModel();
        $data = [
            'id' => Uuid::uuid4(), // generate a v4 (random) UUID object
            'nama' => $this->request->getVar('nama'),
            'alamat'  => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
        ];
        try {
            $model->insert($data);
            $response = [
                'status'   => 201,
                'messages' => 'Items added successfully',
                'data'     => $data,
            ];
            return $this->respondCreated($response);
        } catch (DatabaseException $e) {
            // Check if it's a duplicate entry error
            if (strpos($e->getMessage(), "Duplicate entry") !== false) {
                return $this->failResourceExists('Duplicate entry', 409);
            }
            // Handle other database-related errors
            return $this->failServerError('Server error');
        }
    }

    public function show($id = null) // GET /perusahaan/$id
    {
        $model = new PerusahaanModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            $response = [
                'status'   => 200,
                'messages' => 'Items retrieved successfully',
                'data'     => $data,
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Item Not found');
        }
    }

    public function update($id = null) // PUT /perusahaan/$id
    {
        $model = new PerusahaanModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'alamat'  => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
        ];
        try {
            $model->update($id, $data);
            $response = [
                'status'   => 200,
                'messages' => 'Items updated successfully',
                'data'     => $data,
            ];
            return $this->respond($response);
        } catch (DatabaseException $e) {
            // Check if it's a duplicate entry error
            if (strpos($e->getMessage(), "Duplicate entry") !== false) {
                return $this->failResourceExists('Duplicate entry', 409);
            }
            // Handle other database-related errors
            return $this->failServerError('Server error');
        }
    }

    public function delete($id = null) // DELETE /perusahaan/$id
    {
        $model = new PerusahaanModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'messages' => 'Items deleted successfully',
                'data'     => $data,
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Item not found');
        }
    }
}
