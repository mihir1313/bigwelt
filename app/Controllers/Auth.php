<?php 
namespace App\Controllers;

use App\Models\UserModel; 
use CodeIgniter\Controller;


class Auth extends Controller
{

    public function __construct() {
        $this->session = \Config\Services::session();
    }

    public function login()
    {
   
        // $session = \Config\Services::session();
        // echo '<pre>';
        // print_r($this->request->getMethod());
        if ($this->request->getMethod() === 'POST') {
            // echo '<pre>';
            // print_r('lll');
            // die;
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();

            $user = $userModel->validateUser($username, $password);
      
           
            if ($user) {
                $this->session->set([
                    'id'       => $user['id'],
                    'username' => $user['username'],
                    'status'   => $user['status'],
                    'logged_in' => true,
                ]);
                // echo '<pre>';
                // print_r($user);
                // die;
                return redirect()->to('/details');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        }

        return view('auth/login');
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to('/login')->with('success', 'You have been logged out successfully.');
    }
}
