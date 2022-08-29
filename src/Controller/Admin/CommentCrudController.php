<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextEditorField::new('content', 'Contenu'),
            AssociationField::new('user_comment', 'Utilisateur'),
            AssociationField::new('article','Article'),
            DateTimeField::new('createdAt', 'Créer le')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Mis a jour le')->onlyOnIndex()
        ];
    }

}
