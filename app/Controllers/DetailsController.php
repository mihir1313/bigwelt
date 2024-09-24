<?php

namespace App\Controllers;

use App\Models\DetailsModel; 
use CodeIgniter\Controller;

class DetailsController extends Controller
{
    public function index()
    {
        $model = new DetailsModel();
        $data['users'] = $model->findAll();
        // echo '<pre>';
        // print_r($data);
        // die; 
        return view('details_form', $data); 
    }

    public function save()
    {
        $model = new DetailsModel();

        $validation = $this->validate([
            'username' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'password' => 'required|min_length[6]|max_length[255]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', 'Please fill in all required fields.');
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), 
            'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
        ];
        $id = $this->request->getPost('id');

        if ($id) {
            // Update user
            $model->update($id, $data);
            session()->setFlashdata('success', 'User updated successfully.');
        } else {
            // Insert user
            $model->insert($data);
            session()->setFlashdata('success', 'User created successfully.');
        }

        return redirect()->to('/details'); 
    }

    public function edit($id)
    {
        $model = new DetailsModel();
        $data['users'] = $model->findAll();
        $data['user'] = $model->find($id); 
       
        return view('details_form', $data); 
    }

    public function update($id)
    {
        $model = new DetailsModel();

        $validation = $this->validate([
            'username' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'password' => 'permit_empty|min_length[6]|max_length[255]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', 'Please fill in all required fields.');
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        if ($model->update($id, $data)) {
            return redirect()->to('/details')->with('success', 'User details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update user details.')->withInput();
        }
    }

    public function delete($id)
    {
        $model = new DetailsModel();
        if ($model->delete($id)) {
            return redirect()->to('/details')->with('success', 'User details deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete user details.');
        }
    }
}
