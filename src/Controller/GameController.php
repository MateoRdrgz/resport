<?php

namespace App\Controller;

use App\Factory\GameFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Service\GameService;

use App\Entity\Game;

class GameController extends AbstractController
{
    private $httpClient;
    private $gameFactory;
    private $gameService;

    public function __construct(HttpClientInterface $httpClient, GameFactory $gameFactory, GameService $gameService)
    {
        $this->httpClient = $httpClient;
        $this->gameFactory = $gameFactory;
        $this->gameService = $gameService;
    }
    #[Route('/game', name: 'app_game')]
    public function index(): Response
    {
        $response = $this->gameService->getGames();
        dd($response);
        $games = $this->gameFactory->createManyGamesFromApi($response,true);
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
            'games' => $games,
        ]);
    }
}
