<?php

namespace App\Controller;

use App\Service\MatchService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchController extends AbstractController
{
    private $matchService;

    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    #[Route('/match', name: 'app_match')]
    public function index(): Response
    {
        $response = $this->matchService->getMatches();
        dd($response);
        return $this->render('match/index.html.twig', [
            'controller_name' => 'MatchController',
            'matches' => $response,
        ]);
    }
}