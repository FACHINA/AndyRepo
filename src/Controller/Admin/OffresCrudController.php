<?php

namespace App\Controller\Admin;

use App\Entity\Agence;
use App\Entity\Offres;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
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

    public function configureActions(Actions $actions): Actions
    {
        return $actions
       
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
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

    /**@var QueryBuilder $result */
//    protected function createListQueryBuilder ($entityClass, $sortDirection, $sortField = null, $dqlFilter = null){
//     $result = parent::createListQueryBuilder($entityClass, $sortDirection, $sortField, $dqlFilter);
//      if (method_exists($entityClass,'getUser')){
//          $result->andWhere('entity.Agence = :user_id');
//          $result->setParameter('user_id' , $this->getUser()->getId());
//      }
//        return $result ;

 //   }

 
//ublic function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
//
//  parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
//  $qb = $this->entityManager->get(OffresRepository::class);
//  $qb
//   ->createQueryBuilder($searchDto, $entityDto, $fields, $filters);
//
//   if (in_array('ROLE_AGENCE', $this->getUser()->getRoles())) {
//      $qb->andWhere('entity.Agence = :user');
//   } 
//
//   $qb->setParameter('user', $this->getUser()->getId());
//
//   return $qb;
//


   
}
