<?php

namespace App\Controller\Admin;

use App\Entity\Accueil;
use App\Entity\AuteursBlogs;
use App\Entity\Blog;
use App\Entity\HorairesApports;
use App\Entity\HorairesMagasin;
use App\Entity\ImagesBlogs;
use App\Entity\LocalisationSites;
use App\Entity\OngletsOrganigramme;
use App\Entity\Organigramme;
use App\Entity\RoleOrganigramme;
use App\Entity\SitesIddees;
use App\Entity\Sources;
use App\Entity\ThemesBlogs;
use App\Entity\VideosBlogs;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
//        return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(BlogCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Iddees Dynamique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::LinkToCrud("Page d'accueil", 'fa fa-home', Accueil::class);
        yield MenuItem::LinkToCrud('Articles', 'fa fa-newspaper', Blog::class);
        yield MenuItem::LinkToCrud('Auteurs des Articles', 'fa fa-person', AuteursBlogs::class);
        yield MenuItem::LinkToCrud('Vidéos Articles', 'fa fa-video', VideosBlogs::class);
        yield MenuItem::LinkToCrud('Images Articles', 'fa-regular fa-image', ImagesBlogs::class);
        yield MenuItem::LinkToCrud('Sources Articles', 'fa-solid fa-link', Sources::class);
        yield MenuItem::LinkToCrud('Thèmes associés aux Articles', 'fa-solid fa-swatchbook', ThemesBlogs::class);
        yield MenuItem::LinkToCrud('Organigramme', 'fa fa-sitemap', Organigramme::class);
        yield MenuItem::LinkToCrud("Localisations pour l'oragnigramme", 'fa fa-location-dot', LocalisationSites::class);
        yield MenuItem::LinkToCrud("Onglets pour l'oragnigramme", 'fa-solid fa-table-columns', OngletsOrganigramme::class);
        yield MenuItem::LinkToCrud("Rôles au sein de l'Organigramme", 'fa fa-sitemap', RoleOrganigramme::class);
        yield MenuItem::LinkToCrud("Les sites d'IDDEES", 'fa fa-shop', SitesIddees::class);
        yield MenuItem::LinkToCrud('Horaires des Sites : Apports', 'fa-regular fa-clock', HorairesApports::class);
        yield MenuItem::LinkToCrud('Horaires des Sites : Magasin', 'fa-solid fa-clock', HorairesMagasin::class);

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
