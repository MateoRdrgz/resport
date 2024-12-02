<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GameService
{
    private $httpClient;
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    public function getGames(): array
    {
        $response = $this->httpClient->request('GET', 'https://api.pandascore.co/videogames', [
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Bearer ' . $_ENV['ES_TOKEN'],
            ],
        ]);
        return $response->toArray();
    }

}