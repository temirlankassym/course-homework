<?php
namespace App\Services;
use GuzzleHttp\Client,App\Interfaces\Api;

class CurrencyExchange implements Api{
    protected string $url;
    protected array $headers;
    protected array $params;

    protected Client $client;

    public function __construct(string $url, array $headers, array $params)
    {
        $this->url = $url;
        $this->headers = $headers;
        $this->params = $params;

        $this->client = new Client([
            'verify' => false,
            'base_uri' => $this->url,
            'headers' => $this->headers,
            'query' => $this->params,
        ]);
    }
    public function get(){
        $response = $this->client->request('GET', $this->url, [
            'headers' => $this->headers,
            'query' => $this->params,
        ]);

        return $response->getBody()->getContents();
    }
}