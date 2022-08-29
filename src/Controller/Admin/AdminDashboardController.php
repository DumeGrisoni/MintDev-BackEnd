<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class AdminDashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ){
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(ArticleCrudController::class)
        ->generateUrl();
        
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Articles');
        yield MenuItem::subMenu('Modifications', 'fas fa-bars')
        ->setSubItems([
            MenuItem::linkToCrud('Ajouter un article', 'fas fa-plus', Article::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir un article', 'fas fa-eye', Article::class)
        ]);
        yield MenuItem::section('Catégories');
        yield MenuItem::subMenu('Modifications', 'fas fa-bars')
        ->setSubItems([
            MenuItem::linkToCrud('Ajouter une catégorie', 'fas fa-plus', Category::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir une catégorie', 'fas fa-eye', Category::class)
        ]);
        yield MenuItem::section('Commentaires');
        yield MenuItem::linkToCrud('Voir un commentaire', 'fa-solid fa-comment', Comment::class);

        yield MenuItem::section('Blogeurs');
        yield MenuItem::linkToCrud('Liste des Blogeurs', 'fa-solid fa-people-group', User::class);
    }
}
