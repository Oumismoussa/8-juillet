<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PremierepageController extends AbstractController
{
    #[Route('/premierepage', name: 'app_premierepage')]
    public function index(): Response
    {
        return $this->render('premierepage/index.html.twig', [
            'controller_name' => 'PremierepageController',
        ]);
    }
}
