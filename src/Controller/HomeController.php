<?php

namespace App\Controller;

use App\Repository\BienRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(UtilisateurRepository $repo_utilisateur, BienRepository $repo_bien): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'ma gueule!',
            'utilisateur' => $utilisateur,
        ]);
    }
}
