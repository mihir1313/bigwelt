<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailsModel extends Model
{
    protected $table = 'details'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['username', 'email', 'password', 'created_at', 'updated_at'];

    protected $useTimestamps = true; 
    protected $createdField  = 'created_at'; 
    protected $updatedField  = 'updated_at'; 


    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[100]',
        'email' => 'required|valid_email|max_length[100]',
        'password' => 'required|min_length[6]|max_length[255]',
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username is required.',
            'min_length' => 'Username must be at least 3 characters long.',
            'max_length' => 'Username must not exceed 100 characters.',
        ],
        'email' => [
            'required' => 'Email is required.',
            'valid_email' => 'Please provide a valid email address.',
            'max_length' => 'Email must not exceed 100 characters.',
        ],
        'password' => [
            'required' => 'Password is required.',
            'min_length' => 'Password must be at least 6 characters long.',
            'max_length' => 'Password must not exceed 255 characters.',
        ],
    ];
}
