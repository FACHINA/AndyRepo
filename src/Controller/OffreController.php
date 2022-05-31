<?php

namespace App\Controller;

use App\Entity\Caracteristiques;
use App\Entity\Offres;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OffreController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this -> entityManager= $entityManager;
    }

    #[Route('/offre', name: 'offre')]
    public function index(): Response
    {
        $offres = $this -> entityManager->getRepository(Offres::class)->findAll();
        $description = $this -> entityManager->getRepository(Caracteristiques::class)->findAll();
        return $this->render('offre/index.html.twig', [
            'offre' => $offres,
            'description' => $description,
        ]);


       
    }

    #[Route('/offre/{slug}', name: 'offre_single')]
    public function show($slug): Response
    {
        $offresingle = $this -> entityManager->getRepository(Offres::class)->findOneByslug($slug);
        if(!$offresingle){
            $this->addFlash(
               'notice',
               'Offre Invalid'
            );
            return $this->redirectToRoute('offre');
        }
        return $this->render('offre/show.html.twig', [
            'offresingle'=> $offresingle,
        ]);
    }
}
