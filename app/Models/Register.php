<?php

namespace App\Models;

use CodeIgniter\Model;

class Register extends Model
{
    protected $table = 'users'; // Ganti 'users' dengan nama tabel sesuai kebutuhan Anda
    protected $primaryKey = 'email'; // Ganti 'id' dengan kolom kunci utama sesuai kebutuhan Anda

    // Tambahkan kolom lain sesuai kebutuhan
    protected $allowedFields = ['name', 'email', 'password'];

    public function registerUser($data)
    {
        // Cek apakah email sudah terdaftar
        $existingUser = $this->where('email', $data['email'])->first();

        if ($existingUser) {
            // Email sudah terdaftar, return false
            return false;
        } else {
            // Email belum terdaftar, lakukan registrasi
            $this->insert($data);
            return $this->db->affectedRows() > 0;
        }
    }
}
