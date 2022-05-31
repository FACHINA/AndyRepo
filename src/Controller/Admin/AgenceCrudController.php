<?php

namespace App\Controller\Admin;

use App\Entity\Agence;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;

class AgenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Agence::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            EmailField::new('email'),
            TextField::new('NomAgence'),
            TelephoneField::new('TelAgence'),
            ArrayField::new('roles'),
            TextField::new('NumRegistreCom'),
            TextField::new('Longitude')
                ->hideOnIndex(),
            TextField::new('Latitude')
                ->hideOnIndex(),
            TextareaField::new('description')
                ->hideOnIndex(),
            TextareaField::new('LocationDesc')
                ->hideOnIndex(),
            TextField::new('password')
                ->hideOnIndex(),
            BooleanField::new('IsVerified'),
        ];
    }
 
}
