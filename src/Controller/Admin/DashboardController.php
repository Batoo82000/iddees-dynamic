<?php

namespace App\Controller\Admin;

use App\Entity\Accueil;
use App\Entity\APropos;
use App\Entity\AuteursBlogs;
use App\Entity\Blog;
use App\Entity\HorairesApports;
use App\Entity\HorairesMagasin;
use App\Entity\ImagesBlogs;
use App\Entity\LocalisationSites;
use App\Entity\MentionsLegales;
use App\Entity\OngletsOrganigramme;
use App\Entity\Organigramme;
use App\Entity\Partners;
use App\Entity\PartnersCategories;
use App\Entity\RGPD;
use App\Entity\RoleOrganigramme;
use App\Entity\SitesIddees;
use App\Entity\SocialNetwork;
use App\Entity\Sources;
use App\Entity\ThemesBlogs;
use App\Entity\User;
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

        yield MenuItem::linkToUrl('Retourner au site', 'fa fa-home', $this->generateUrl('accueil')); // pour linker vers notre page accueil, il ne faut pas utiliser linkToRoute, mais linkToUrl, pour éviter d'avoir une url anormale, car le lien s'ouvrirait alors à travers le dashboard
        yield MenuItem::LinkToCrud("Page d'accueil", 'fa fa-home', Accueil::class);
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_AUTHOR')) {
            yield MenuItem::LinkToCrud('Articles', 'fa fa-newspaper', Blog::class);
        }
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_AUTHOR')) {
            yield MenuItem::LinkToCrud('Auteurs/autrices des Articles', 'fa fa-person', AuteursBlogs::class);
        }
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_AUTHOR')) {
            yield MenuItem::LinkToCrud('Vidéos pour les Articles', 'fa fa-video', VideosBlogs::class);
        }
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_AUTHOR')) {
            yield MenuItem::LinkToCrud('Images pour les Articles', 'fa-regular fa-image', ImagesBlogs::class);
        }
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_AUTHOR')) {
            yield MenuItem::LinkToCrud('Sources pour les Articles', 'fa-solid fa-link', Sources::class);
        }
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_AUTHOR')) {
            yield MenuItem::LinkToCrud('Thèmes associés aux Articles', 'fa-solid fa-swatchbook', ThemesBlogs::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud('Organigramme', 'fa fa-sitemap', Organigramme::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud("Localisations pour l'organigramme", 'fa fa-location-dot', LocalisationSites::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud("Onglets pour l'organigramme", 'fa-solid fa-table-columns', OngletsOrganigramme::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud("Rôles au sein de l'organigramme", 'fa fa-sitemap', RoleOrganigramme::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud("Les sites d'IDDEES", 'fa fa-shop', SitesIddees::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud('Horaires des Sites : Apports', 'fa-regular fa-clock', HorairesApports::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud('Horaires des Sites : Magasin', 'fa-solid fa-clock', HorairesMagasin::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud('Partenaires', 'fa-solid fa-handshake', Partners::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud('Catégories des partenaires', 'fa-solid fa-swatchbook', PartnersCategories::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud('Gestions des Utilisateurs', 'fa fa-user', User::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud('Pied de page : À propos', 'fa-solid fa-file-contract', APropos::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud('Pied de page : Mentions légales', 'fa-solid fa-file-contract', MentionsLegales::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud('Pied de page : RGPD', 'fa-solid fa-file-contract', RGPD::class);
        }
        if ($this->isGranted('ROLE_ADMIN') && '...') {
            yield MenuItem::LinkToCrud('Pied de page : Réseaux sociaux', 'fa-solid fa-network-wired', SocialNetwork::class);
        }
    }
}

