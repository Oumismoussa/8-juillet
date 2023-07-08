<?php

namespace App\Controller;

use App\Entity\PropertySearch;
use App\Repository\FamilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\PropertysearchTyoeType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class FamilleController extends AbstractController
{
    #[Route('/famille', name: 'app_famille')]
    public function index(FamilleRepository $familleRepository, Request $request): Response
    {
        $searchData = new PropertySearch();
        $form = $this->createForm(PropertysearchTyoeType::class, $searchData);
        $form->handleRequest($request);
        $famille = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form->get('name')->getData();

            if (!empty($name)) {
                $famille = $familleRepository->findBy(['name' => $name]);
            }
        }else {
            // Le formulaire n'a pas encore été soumis
            $famille = $familleRepository->findAll();
            
        }

        return $this->render('famille/index.html.twig', [
            'form' => $form->createView(),
            'famille' => $famille
        ]);
    }
}
