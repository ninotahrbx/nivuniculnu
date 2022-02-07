<?php

namespace App\Controller;

use DateTime;
use App\Form\CreateAnnonceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class AnnoncesController extends AbstractController
{
    #[Route('/annonces', name: 'annonces')]
    public function index(EntityManagerInterface $manager): Response
    {

        $this->manager = $manager;
        $annonces = $this->manager->getRepository(Bien::class)->findAll();



        return $this->render('annonces/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }


    #[Route('/annonces/creer-annonce', name: 'creer-annonce')]
    public function creerAnnonce(Request $request, EntityManagerInterface $manager, UserInterface $utilisateur, SluggerInterface $slugger): Response
    {
       
       $annonce = new Bien();
       $form = $this->createForm(CreateAnnonceType::class, $annonce);

       //ecouteur d'evenement
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()){             
          $annonce->setDateCreation(new DateTime());
          $annonce->setIdUtilisateur($utilisateur);
          $slugify = new Slugify();
          $annonce->setslug($slugify->slugify($article->getTitre()));

          $imgFile = $form->get('img')->getData();
          $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
          $safeFilename = $slugger->slug($originalFilename);
          $newFilename = $safeFilename.'-'.uniqid().'.'.$imgFile->guessExtension();
          
          try {
            $imgFile->move(
                $this->getParameter('img_directory'),
                $newFilename
            );
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        // updates the 'brochureFilename' property to store the PDF file name
        // instead of its contents
       
        $annonce->setImg($newFilename);

        $manager->persist($annonce);
        $manager->flush();
        
        
          return $this->redirectToRoute('annonces');
          

       }



        return $this->render('annonces/creer-annonce.html.twig', [
            'controller_name' => 'AnnoncesController',
            'form'=> $form->createView()
        ]);
    }










}
