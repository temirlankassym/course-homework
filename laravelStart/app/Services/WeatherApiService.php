<?php
namespace App\Services;

use GuzzleHttp\Client;

class WeatherApiService{
    private $url;
    private $key;

    public function __construct(){
        $this->url = 'https://weatherapi-com.p.rapidapi.com/current.json';
        $this->key = '2ee0108639msh93241f35c5e2aacp124ed2jsnc22b57a43552';
    }

    public  function getApiData()
    {
        $client = new Client(['verify' => false]);

        $response = $client->request('GET',
            $this->url,
            [
                'headers' => [
                    'X-RapidAPI-Key'=>$this->key,
                    'X-RapidAPI-Host'=>'weatherapi-com.p.rapidapi.com'
                ],
                'query' => [
                    'q'=>'43.2380,76.8829 Almaty'
                ]
            ]);
        return json_decode($response->getBody(), true);
    }
}
