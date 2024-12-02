<?php

namespace App\Controller;

use App\Service\SaisonService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaisonController extends AbstractController
{
    private $saisonService;

    public function __construct(SaisonService $saisonService)
    {
        $this->saisonService = $saisonService;
    }

    #[Route('/saison', name: 'app_saison')]
    public function index(): Response
    {
        $response = $this->saisonService->getSaisons();
        dd($response);
        return $this->render('saison/index.html.twig', [
            'controller_name' => 'SaisonController',
            'saisons' => $response,
        ]);
    }
}