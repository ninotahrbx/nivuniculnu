<?php

namespace App\Controller;
use DateTime;
use App\Entity\Bien;
use GuzzleHttp\Client;
use App\Entity\Filtres;
use App\Entity\TypeBien;
use App\Form\FiltresType;
use App\Form\TypeBienType;
use Cocur\Slugify\Slugify;
use App\Entity\TypeAnnonce;
use App\Form\TypeAnnonceType;
use App\Entity\PropertySearch;
use App\Form\CreateAnnonceType;
use Doctrine\ORM\EntityManager;
use App\Form\PropertySearchType;
use App\Repository\BienRepository;
use App\Repository\TypeBienRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TypeAnnonceRepository;
use Symfony\Contracts\Cache\ItemInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class AnnoncesController extends AbstractController
{ 
    
    // afficher toutes les annonces
    #[Route('/annonces', name: 'annonces')]
    public function index(BienRepository $bienrepo, TypeAnnonceRepository $typeAnnonce, EntityManagerInterface $manager, TypeBienRepository $typeBien, PaginatorInterface $paginator, Request $request)
    {
              $this->manager = $manager;
            // annonces par page
             $limit = 2;

             // numero de page
             $page = (int)$request->query->get("page", 1);
             $biens= new Filtres();                      
             $form = $this->createForm(FiltresType::class, $biens);
             $form->handleRequest($request);
             
             
            $annonces = $bienrepo->selectInterval("2022-01-31", "2022-02-14", 1, 1);
            $annonces = $this->manager->getRepository(Bien::class)->findBy([],['dateParution' => 'desc']);

             // on recupere les annonces de la page
            $annonces = $bienrepo->getPaginatedAnnonces($page, $limit); 
            $total = $bienrepo->getTotalAnnonces(); 
            
            $filtresTypeAnnonces = $typeAnnonce->findAll();
            $filtresTypeBiens = $typeBien->findAll();
            $filtres[] = [$filtresTypeAnnonces, $filtresTypeBiens];
            
            return $this->render('annonces/index.html.twig',[ 
                'annonces' => $annonces,
                'total'  =>$total,
                'limit' =>$limit,
                'page'  =>$page,
                'filtres' => $filtres,
                'filtresTypeAnnonces' => $filtresTypeAnnonces,
                'filtresTypeBiens' => $filtresTypeBiens,
                'form' => $form->createView(),            
             ]);

    }
    
    // creer une annonce
    #[Route('/annonces/creer-annonce', name: 'creer-annonce')]
    public function creerAnnonce(Request $request, EntityManagerInterface $manager, UserInterface $utilisateur, SluggerInterface $slugger): Response
    {
       
       $annonce = new Bien();
       $form = $this->createForm(CreateAnnonceType::class, $annonce);

       //ecouteur d'evenement
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()){             
          $annonce->setDateParution(new DateTime());
          $annonce->setIdUtilisateur($utilisateur);
          $slugify = new Slugify();
          $annonce->setslug($slugify->slugify($annonce->getDescription()));
         
          $api  = 'https://geo.api.gouv.fr/';
        if(!empty($_POST['codepostal']) && !empty($_POST['ville']))
        {  
            $codePostal = strip_tags($post['codepostal']);
            $ville = strip_tags($post['ville']);
            $client = new GuzzleHttp\Client(['base_uri' => $api]);
            $response = $client->request('GET', 'communes?codePostal='.$codePostal.'&fields=nom&format=json');
            $response = json_decode($response->getBody()->getContents());
  
            $villes = [];
            
         foreach($response as $resp){
          array_push($villes, $resp->nom);
        }
            $annonce->setCodePostal($codePostal.stringify());
            $annonce->setVille($ville.stringify());
            
         if(in_array($Ville, $Villes)){
           $success = 'Informations envoyées';
          }
         else{
            $error = 'Le code postal et la commune ne correspondent pas.';
         } 
        } 
        
        // envoyer l'image dans uploads et l'appeler par le nom dans la bdd
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
          }
        $annonce->setImg($newFilename);

        $manager->persist($annonce);
        $manager->flush();
                
          return $this->redirectToRoute('annonces');          

       }


        return $this->render('annonces/create.html.twig', [
            'form'=> $form->createView()
        ]);
    }

    // afficher l'annonce selectionnée
    #[Route('/annonces/{idBien}', name: 'annonce')]
    public function annonce(Bien $annonce, Request $request): Response
    {      
        $biens= new Filtres();
        $form = $this->createForm(FiltresType::class, $biens);
        $form->handleRequest($request);

        return $this->render('annonces/annonce.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView()
        ]);
    } 



/* // afficher l'annonce par type de bien
#[Route('/annonces/{idBien/{idType}', name: 'annonce')]
public function typeDeBien(Bien $annonce, EntityManagerInterface $manager): Response
{      
    $this->manager = $manager;
    $idType = $this->manager->getRepository(TypeBien::class)->findByTypeBien($idBien);
    return $this->render('annonces/annonce.html.twig', [
        'annonce' => $annonce,
    ]);
} 


// afficher l'annonce par type d'annonce'
#[Route('/annonces/{idBien}/{idTypeAnnonce}', name: 'annonce')]
public function typeAnnonce(Bien $annonce, EntityManagerInterface $manager): Response
{    
    $this->manager = $manager;
    $idTypeAnnonce = $this->manager->getRepository(TypeAnnonce::class)->findByTypeAnnonce($idBien);
    return $this->render('annonces/annonce.html.twig', [
        'annonce' => $annonce,
    ]);
} 

 */



}
