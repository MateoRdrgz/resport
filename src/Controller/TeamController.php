<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TeamController extends AbstractController
{
    #[Route('/', name: 'app_team')]
    public function index(): Response
    {

        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
        ]);
    }
}