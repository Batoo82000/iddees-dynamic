<?php

namespace App\Controller\Admin;

use App\Entity\Horaires;
use App\Entity\HorairesApports;
use App\Entity\HorairesMagasin;
use App\Entity\LocalisationSites;
use App\Entity\Organigramme;
use App\Entity\RoleOrganigramme;
use App\Entity\SitesIddees;
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
         return $this->redirect($adminUrlGenerator->setController(OrganigrammeCrudController::class)->generateUrl());

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
            ->setTitle('Iddees : page de gestion');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Organigramme', 'fas fa-list', Organigramme::class);
        yield MenuItem::linkToCrud('Rôles Organigramme', 'fas fa-sitemap', RoleOrganigramme::class);
        yield MenuItem::linkToCrud('Localisation', 'fas fa-location-dot', LocalisationSites::class);
        yield MenuItem::linkToCrud("Sites d'IDDEES", 'fas fa-shop', SitesIddees::class);
        yield MenuItem::linkToCrud("Horaires magasin", 'fas fa-clock', HorairesMagasin::class);
        yield MenuItem::linkToCrud("Horaires apports", 'fas fa-recycle', HorairesApports::class);
    }
}
