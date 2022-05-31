<?php

namespace App\Controller;

use App\Entity\Agence;
use App\Form\RegistrationFormType;
use App\Form\AgenceRegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AgenceRegistrationController extends AbstractController
{


    protected $slugger;
    
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger=$slugger;
    }



    #[Route('/inscription-agence', name: 'inscription-agence')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    { if ($this->getUser()) {
        
        $this->addFlash(
           'notice',
           'Vous est deja inscrit sur notre plateforme'
        );
       
    return $this->render('acceuil/index.html.twig');
    }
        
        $user = new Agence();
        $form = $this->createForm(AgenceRegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $user->setIsVerified(true);
    
            $slugged=$this->slugger->slug($user->getNomAgence());
            $user->setSlug($slugged);
     

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('acceuil');
        }

        return $this->render('registration/agence-register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
