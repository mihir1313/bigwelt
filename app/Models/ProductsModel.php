<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price'];
    protected $useTimestamps = true;

    // Get all products
    public function getProducts()
    {
        return $this->findAll();
    }

    // Get a product by ID
    public function getProduct($id)
    {
        return $this->find($id);
    }
    public function createProduct($data)
    {
        // Insert the data into the database
        return $this->insert([
            'name'        => $data->name,
            'description' => $data->description,
            'price'       => $data->price,
        ]);
    }

    public function updateProduct($id, $data)
{
    $updateData = [
        'name'        => $data->name ?? '',
        'description' => $data->description ?? '',
        'price'       => $data->price ?? 0,
    ];

    // Perform the update operation
    return $this->update($id, $updateData);
}

public function deleteProduct($id)
{
    return $this->delete($id);
}
}
