<?php

namespace App\Controller;

use App\Service\LeagueService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LeagueController extends AbstractController
{
    private $leagueService;

    public function __construct(LeagueService $leagueService)
    {
        $this->leagueService = $leagueService;
    }

    #[Route('/league', name: 'app_league')]
    public function index(): Response
    {
        $response = $this->leagueService->getLeagues();
        dd($response);
        return $this->render('league/index.html.twig', [
            'controller_name' => 'LeagueController',
            'leagues' => $response,
        ]);
    }
}