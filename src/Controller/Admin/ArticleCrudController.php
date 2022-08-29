<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPaginatorPageSize(10)->setPaginatorRangeSize(4);
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title','Titre'),
            TextField::new('excerpt', 'Extrait'),
            TextField::new('imageFile', 'Image')->setFormType(VichImageType::class)->setLabel('Image de couverture')->onlyOnForms(),
            ImageField::new('image')->setBasePath('/images/blog')->onlyOnIndex(),
            TextEditorField::new('content', 'Contenu')->hideOnIndex(),
            DateTimeField::new('createdAt','Créé le')->hideOnForm(),
            DateTimeField::new('updatedAt', 'Mis à jour le')->hideOnForm(),
            AssociationField::new('author', 'Auteur'),
            BooleanField::new('accepted', 'Accepter'),
            AssociationField::new('categories', 'Categorie')
            
        ];
    }
    
}
