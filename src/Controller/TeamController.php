<?php

namespace App\Controller;

use App\Service\TeamService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    private $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    #[Route('/team', name: 'app_team')]
    public function index(): Response
    {
        $response = $this->teamService->getTeams();
        dd($response);
        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
            'teams' => $response,
        ]);
    }
}