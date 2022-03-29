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
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'ma gueule!',
            'subtitle' => 'Cliquez ici',
            'event' => 'REJOINDRE'

            // 'utilisateur' => $utilisateur,
        ]);
    }


    #[Route('/home/contact', name: 'contact')]
    public function contacter(UtilisateurRepository $repo_utilisateur, BienRepository $repo_bien): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'ma gueule!',
            'subtitle' => 'Cliquez ici',
            'event' => 'REJOINDRE'

            // 'utilisateur' => $utilisateur,
        ]);
    }


    #[Route('/home/documentation', name: 'documentation')]
    public function consulter(): Response
    {
        return $this->render('home/documentation.html.twig', [
            'controller_name' => 'ma gueule!',
            'subtitle' => 'Cliquez ici',
            'event' => 'REJOINDRE'

            // 'utilisateur' => $utilisateur,
        ]);
    }


}
