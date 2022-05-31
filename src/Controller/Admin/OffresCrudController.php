<?php

namespace App\Controller\Admin;

use App\Entity\Offres;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OffresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offres::class;
    }



    //protected function createListQueryBuilder($entityClass, $sortDirection, $sortField = null, $dqlFilter = null);  

    public function configureFields(string $pageName): iterable
    {
        
        return [
            
            AssociationField::new('Agence')  
                ->setQueryBuilder(function (QueryBuilder $queryBuilder )
                {
                    $queryBuilder 
                    ->where('entity.id = :user_id')
                    ->setParameter('user_id',$this->getUser()->getId());
                })
                ->setRequired(true),
            AssociationField::new('Agence')
                ->setPermission('ROLE_ADMIN'),
            AssociationField::new('categoriestooffres','Categorie')
            ->setPermission('ROLE_AGENCE'),
            AssociationField::new('caracterisiquesofoffres'),
            TextField::new('NomOffre'),
            SlugField::new('slug')
                ->hideOnIndex()
                ->setTargetFieldName('NomOffre'),
            TextareaField::new('Description')
                ->setRequired(true),
            MoneyField::new('PrixOffres')
                ->setCurrency('XOF')


            
        ];
    }

   
}
