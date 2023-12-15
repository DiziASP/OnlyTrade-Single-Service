<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BarangModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Ramsey\Uuid\Uuid;

class Barang extends ResourceController
{
    use ResponseTrait;

    public function index() // GET /barang
    {
        $model = new BarangModel();
        $data = $model->orderBy('id', 'DESC')->findAll();
        $response = [
            'status'   => 200,
            'messages' => 'Items retrieved successfully',
            'data'     => $data,
        ];
        return $this->respond($response);
    }

    public function create() // POST /barang
    {
        $model = new BarangModel();
        $data = [
            'id' => Uuid::uuid4(), // generate a v4 (random) UUID object
            'name' => $this->request->getVar('name'),
            'stock'  => $this->request->getVar('stock'),
            'price' => $this->request->getVar('price'),
            'perusahaan_id' => $this->request->getVar('perusahaan_id'),
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

    public function show($id = null) // GET /barang/$id
    {
        $model = new BarangModel();
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

    public function update($id = null) // PUT /barang/$id
    {
        $model = new BarangModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'stock'  => $this->request->getVar('stock'),
            'price' => $this->request->getVar('price'),
            'perusahaan_id' => $this->request->getVar('perusahaan_id'),
        ];
        try {
            $res = $model->update($id, $data);

            if ($res) {
                $response = [
                    'status'   => 200,
                    'messages' => 'Items updated successfully',
                    'data'     => $data,
                ];
                return $this->respond($response);
            }

            throw new DatabaseException("Data Not Found");
        } catch (DatabaseException $e) {
            // Check if it's a duplicate entry error
            if (strpos($e->getMessage(), "Duplicate entry") !== false) {
                return $this->failResourceExists('Duplicate entry', 409);
            }
            // Handle other database-related errors
            return $this->fail($e->getMessage(), 500);
        }
    }

    public function delete($id = null) // DELETE /barang/$id
    {
        $model = new BarangModel();
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
