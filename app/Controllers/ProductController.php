<?php

namespace App\Controllers;

use App\Models\ProductsModel; 

class ProductController extends BaseController {
    private $apiKey = '1234567890abcdef'; 
    public function __construct() {
        $this->productsModel = new ProductsModel(); 
    }

    private function checkApiKey() {
        $headers = $this->request->getHeader('Authorization');

        if ($headers !== $this->apiKey) {
            return $this->response->setStatusCode(403, 'Unauthorized access');
        }
    }

    public function index() {
        $this->checkApiKey();

        $products = $this->productsModel->getProducts();
        return $this->response->setJSON($products);
    }

    public function create() {
       
        $this->checkApiKey();
    
        $data = $this->request->getJSON();
   
        if (empty($data)) {
            return $this->response->setJSON(['error' => 'No data received'])->setStatusCode(400);
        }
    
        if (!isset($data->name) || !isset($data->description) || !isset($data->price) || !isset($data->quantity)) {
            return $this->response->setJSON(['error' => 'Missing required fields'])->setStatusCode(400);
        }
    
        $insertedId = $this->productsModel->createProduct($data);
        if ($insertedId) {
            return $this->response->setJSON(['status' => 201, 'message' => 'Product created', 'id' => $insertedId]);
        } else {
            return $this->response->setStatusCode(500, 'Failed to create product');
        }
        // return $this->response->setStatusCode(201, 'Product created');
    }

    public function update($id)
    {
        $data = (object)[
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
        ];
    
        if ($this->productsModel->updateProduct($id, $data)) {
            return $this->response->setJSON(['status' => 200, 'message' => 'Product updated']);
        } else {
            return $this->response->setStatusCode(500, 'Failed to update product');
        }
    }

    public function delete($id) {
        $this->checkApiKey();
    
        $product = $this->productsModel->getProduct($id);
        
        if (!$product) {
            return $this->response->setStatusCode(404, 'Product not found')->setJSON(['message' => 'Product not found']);
        }
    
        $this->productsModel->deleteProduct($id);
    
        return $this->response->setStatusCode(200)->setJSON(['message' => 'Product deleted successfully']);
    }
}
