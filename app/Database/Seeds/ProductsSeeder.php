<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'Product 1',
                'description' => 'Description for Product 1',
                'price'       => 19.99,
            ],
            [
                'name'        => 'Product 2',
                'description' => 'Description for Product 2',
                'price'       => 29.99,
            ],
            [
                'name'        => 'Product 3',
                'description' => 'Description for Product 3',
                'price'       => 39.99,
            ],
        ];

        foreach ($data as $product) {
            $this->db->table('products')->insert($product);
        }
    }
}
