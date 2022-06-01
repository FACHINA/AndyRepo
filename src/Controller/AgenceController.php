<?php

namespace App\Controller;

use App\Entity\Agence;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgenceController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this -> entityManager= $entityManager;
    }
    #[Route('/agence', name: 'app_agence')]
    public function index(): Response
    {
        $agence =  $this -> entityManager->getRepository(Agence::class)->findAll();
        return $this->render('agence/index.html.twig', [
            'agence' => $agence,
        ]);
    }
}
