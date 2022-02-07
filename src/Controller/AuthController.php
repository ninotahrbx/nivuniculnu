<?php

namespace App\Controller;

use DateTime;
use App\Form\CreateCompteType;
use App\Entity\CompteUtilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthController extends AbstractController
{
    #[Route('/auth/login', name: 'login')]
    public function index(): Response
    {
        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }


    #[Route('/auth/register', name: 'register')]
    public function register(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $utilisateur = new CompteUtilisateur();
        $form = $this->createForm(CreateCompteType::class, $utilisateur);
 
        //ecouteur d'evenement
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()){
         //   $plaintextPassword = $utilisateur->getPassword();
           $hashedPassword = $passwordHasher->hashPassword(
               $utilisateur,
               $utilisateur->getMdp()     
           );

           $utilisateur->setMdp($hashedPassword);
           $utilisateur->setDateInscription(new DateTime());
           $utilisateur->setIpInscription($_SERVER['REMOTE_ADDR']);
           $utilisateur->setTracker($_SERVER['HTTP_USER_AGENT']);
           $utilisateur->setRoleUtilisateur('ROLE_USER');
           
 
           $manager->persist($utilisateur);
           $manager->flush();
 
           return $this->redirectToRoute('login');
 

        return $this->render('auth/register.html.twig', [
            'form'=> $form->createView()

            
        ]);
        }

    }

   #[Route('/auth/logout', name: 'logout')]
   public function logout(): Response
   {
       return $this->render('auth/index.html.twig', [
           'controller_name' => 'AuthController',
       ]);
   }





} 