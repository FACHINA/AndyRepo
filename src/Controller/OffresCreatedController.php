<?php

namespace App\Controller;

use App\Entity\Offres;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OffresCreatedController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this -> entityManager= $entityManager;
    }
    #[Route('/offres-created', name: 'offres_created')]
    public function grow(): Response
    {
        $user_id = [$this->getUser()->getId()];
        $offresofagency = $this -> entityManager->getRepository(Offres::class)
        ->findBy(['Agence' => $user_id])
        
        ;
        return $this->render('offres-created/index.html.twig', [
            'offresofagency' => $offresofagency,
            
        ]);
        
    }


   
}
