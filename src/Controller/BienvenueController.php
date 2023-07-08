<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class BienvenueController extends AbstractController
{
    #[Route('/bienvenue', name: 'app_bienvenue')]
    public function index(Security $security): Response
    {

            $user = $security->getUser();
        if ($user !== null) {  
            $lastname = $user->getLastname();
        } else {
            // Gérer le cas où l'utilisateur n'est pas connecté
            $lastname = 'Utilisateur non connecté';
        }

        return $this->render('bienvenue/index.html.twig', [
            'controller_name' => 'BienvenueController',
            'lastname' => $lastname,
        ]);
    }
}
