<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class WeatherController extends BaseController
{
    public function index()
    {
     
        return view('weather');
    }
    public function fetchWeather()
    {
        $apiKey = '28120b7fb431fa47f5c0e865a0800352'; 
        $city = $this->request->getPost('city');
    
        if (empty($city)) {
            return redirect()->back()->with('error', 'City name is required.');
        }
    
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
    
        $client = \Config\Services::curlrequest();
    
        try {
            $response = $client->get($url);
            // echo '<pre>';
            // print_r($response);
            // die;
            $data = json_decode($response->getBody(), true);
    
            if (isset($data['cod']) && $data['cod'] !== 200) {
                return redirect()->back()->with('error', $data['message']);
            }
    
            return view('weather', ['weather' => $data]);
        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            return redirect()->back()->with('error', 'Failed to fetch weather data. Please try again later.');
        }
    }
}
