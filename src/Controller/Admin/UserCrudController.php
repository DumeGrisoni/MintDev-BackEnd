<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('pseudo', 'Pseudo'),
            ChoiceField::new('roles')->setChoices(User::ROLE)->allowMultipleChoices()->renderExpanded(),
            TextField::new('name', 'Nom'),
            DateTimeField::new('birthday', 'Naissance'),
            AssociationField::new('articles', 'Nombres d\'articles')->onlyOnIndex(),
            TextField::new('imageFile', 'Photo')->setFormType(VichImageType::class)->setLabel('Photo de Profil')->onlyOnForms(),
            ImageField::new('photo')->setBasePath('/images/blog')->onlyOnIndex()
        ];
    }
    
}
