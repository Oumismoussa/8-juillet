<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class TransitionController extends AbstractController
{

     #[Route(path: '/transition', name: 'app_transition')]
    public function index(Security $security) : Response
    {
        $user = $security->getUser();
        $lastname = $user->getLastname(); // Assumption: You have a "getLastname()" method in your User entity or User class
        
        return $this->render('bienvenue/index.html.twig', [
            'lastname' => $lastname,
        ]);
    }
}
