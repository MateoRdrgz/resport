<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TeamController extends AbstractController
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    #[Route('/team', name: 'app_team')]
    public function index(): Response
    {
        
        $response = $this->httpClient->request('GET', 'https://api.pandascore.co/lol/matches/past', [
        'headers' => [
            'accept' => 'application/json',
            'authorization' => 'Bearer BE1tE3ChZhTXr6vFreod6niOOc9qseRvfEr7RjFTHnf7lswY3Dk',
        ],
        ]);

        dd($response->toArray());
        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
        ]);
    }
}
