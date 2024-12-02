<?php

namespace App\Controller;

use App\Service\PlayerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    private $playerService;

    public function __construct(PlayerService $playerService)
    {
        $this->playerService = $playerService;
    }

    #[Route('/player', name: 'app_player')]
    public function index(): Response
    {
        $response = $this->playerService->getPlayers();
        dd($response);
        return $this->render('player/index.html.twig', [
            'controller_name' => 'PlayerController',
            'players' => $response,
        ]);
    }
}