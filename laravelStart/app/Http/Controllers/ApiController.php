<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ApiController extends Controller
{
    public static function getApiData()
    {
        $client = new Client(['verify' => false]);

        $response = $client->request('GET',
            'https://weatherapi-com.p.rapidapi.com/current.json',
            [
                'headers' => [
                    'X-RapidAPI-Key'=>'2ee0108639msh93241f35c5e2aacp124ed2jsnc22b57a43552',
                    'X-RapidAPI-Host'=>'weatherapi-com.p.rapidapi.com'
                ],
                'query' => [
                    'q'=>'43.2380,76.8829 Almaty'
                ]
            ]);

        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        return $data;
    }
}
