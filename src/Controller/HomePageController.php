<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\HomepageformType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;

class HomePageController extends AbstractController
{
    #[Route('/home/page', name: 'app_home_page')]
  public function index(Request $request, Security $security): Response
{
    $user = $security->getUser();
    $lastname = $user->getLastname();

    $form = $this->createForm(HomepageformType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $data = $form->getData();
        $searchTerm = $data['search_term']; // Supposons que le champ du formulaire s'appelle "search_term"

        // Rechercher les éléments sur la page correspondant au terme de recherche
        $results = $this->searchElementsOnPage($searchTerm);

        return $this->render('home_page/results.html.twig', [
            'controller_name' => 'HomePageController',
            'lastname' => $lastname,
            'search_term' => $searchTerm,
            'results' => $results
        ]);
    }

    return $this->render('home_page/index.html.twig', [
        'controller_name' => 'HomePageController',
        'lastname' => $lastname,
        'form' => $form->createView()
    ]);
}

private function searchElementsOnPage(string $searchTerm): array
{
    $pageContent = // Obtenir le contenu de la page à partir de la source de données (base de données, fichier, API, etc.)

    $pattern = '/\b' . preg_quote($searchTerm) . '\b/i'; // Expression régulière pour rechercher le terme de manière insensible à la casse

    $results = [];
    if (preg_match($pattern, $pageContent)) {
        $results[] = "Le terme \"$searchTerm\" a été trouvé sur la page.";
    } else {
        $results[] = "Le terme \"$searchTerm\" n'a pas été trouvé sur la page.";
    }

    return $results;
}

}
