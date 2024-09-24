<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; 

    public function validateUser($username, $password)
    {
        $user = $this->where('username', $username)->first();

        // Verify password (assuming you are hashing it)
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
