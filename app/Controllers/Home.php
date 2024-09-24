<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index(): string
    // {
    //     $db = \Config\Database::connect();
    //     if ($db->simpleQuery('SELECT 1') === false) {
    //         echo 'Connection failed: ' . $db->error()['message'];
    //     } else {
    //         echo 'Connection successful!';
    //     }
    // }
    public function testConnection()
{
    $db = \Config\Database::connect();
    if ($db->simpleQuery('SELECT 1') === false) {
        echo 'Connection failed: ' . $db->error()['message'];
    } else {
        echo 'Connection successful!';
    }
}
}
