<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashBoardController extends BaseController
{
    public function index()
    {
        return view('dashboard'); 
    }
}
