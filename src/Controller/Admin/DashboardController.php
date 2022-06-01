<?php

namespace App\Controller\Admin;

use App\Entity\Agence;
use App\Entity\Client;
use App\Entity\Offres;
use App\Entity\Categorie;
use App\Entity\Caracteristiques;
use App\Controller\Admin\OffresCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(OffresCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
       //  if (in_array('ROLE_USER') == $this->getUser()->getRoles()) {
         //    return $this->redirect('acceuil');
         //}

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Smartlabs Assurances');
    }



    public function configureMenuItems(): iterable
    {
        //dashboard section
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        //offres sections
        yield MenuItem::section('Offres','fas fa-sections');
        //offrs menu
        yield MenuItem::subMenu('Les offres' ,'fab fa-buffer')
            ->setSubItems([
                    MenuItem::linkToCrud('Ajouter', 'fab fa-plus', Offres::class)
                    ->setAction(Crud::PAGE_NEW),
                    MenuItem::linkToCrud('Voir', 'fas fa-eye', Offres::class)
                    ->setAction(Crud::PAGE_INDEX),      
            ]);
        //categorie menu
        yield MenuItem::subMenu('Les categories' ,'fas fa-box-archive')
            ->setSubItems([
                    MenuItem::linkToCrud('Ajouter', 'fab fa-plus', Categorie::class)
                    ->setAction(Crud::PAGE_NEW),
                    MenuItem::linkToCrud('Voir', 'fas fa-eye', Categorie::class)
                    ->setAction(Crud::PAGE_INDEX),      
            ]);
        //caracteristiques menu
        yield MenuItem::subMenu('Les caractéristiques' ,'fas fa-paste')
            ->setSubItems([
                    MenuItem::linkToCrud('Ajouter', 'fab fa-plus', Caracteristiques::class)
                    ->setAction(Crud::PAGE_NEW),
                    MenuItem::linkToCrud('Voir', 'fas fa-eye', Caracteristiques::class)
                    ->setAction(Crud::PAGE_INDEX),      
            ]); 
        //utilisateurs section
        yield MenuItem::section('Utilisateurs','fas fa-sections');
        //agence menu
        yield MenuItem::subMenu('Les agences' ,'fas fa-building-shield')
            ->setSubItems([
                    MenuItem::linkToCrud('Ajouter', 'fab fa-plus', Agence::class)
                    ->setAction(Crud::PAGE_NEW),
                    MenuItem::linkToCrud('Voir', 'fas fa-eye', Agence::class)
        
            ]); 
        //clients menu
        yield MenuItem::subMenu('Les clients' ,'fas fa-user-group')
            ->setSubItems([
                    MenuItem::linkToCrud('Ajouter', 'fab fa-plus', Client::class)
                    ->setAction(Crud::PAGE_NEW),
                    MenuItem::linkToCrud('Voir', 'fas fa-eye', Client::class)
                    ->setAction(Crud::PAGE_INDEX),      
            ]);
    }
}
