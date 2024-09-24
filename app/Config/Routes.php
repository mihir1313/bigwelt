<?php
namespace Config;

use CodeIgniter\Router\RouteCollection;
$routes = Services::routes();

// Session Routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');


// Secured Routes
$routes->group('', ['filter' => 'auth'], function($routes) {

    // Upload
    $routes->get('upload', 'UploadController::index');
    $routes->post('upload', 'UploadController::upload');
    // Weather
    $routes->get('weather', 'WeatherController::index');
    $routes->post('weather/fetchWeather', 'WeatherController::fetchWeather');
    // CRUD
    $routes->get('details', 'DetailsController::index');
    $routes->get('details/create', 'DetailsController::create');
    $routes->post('details/save', 'DetailsController::save');
    $routes->get('details/edit/(:num)', 'DetailsController::edit/$1');
    $routes->get('details/delete/(:num)', 'DetailsController::delete/$1');
    
    // Security
    $routes->get('security', function() {
        return view('security'); 
    });
});

// APIs
$routes->group('api', function($routes) {
    $routes->get('products', 'ProductController::index'); 
    $routes->post('products', 'ProductController::create'); 
    $routes->put('products/update/(:num)', 'ProductController::update/$1'); 
    $routes->delete('products/(:num)', 'ProductController::delete/$1');
});

// Api guide
$routes->get('apidetail', function() {
    return view('api_page'); 
});

