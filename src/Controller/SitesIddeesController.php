<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SitesIddeesController extends AbstractController
{
    #[Route('/sites/iddees', name: 'app_sites_iddees')]
    public function index(): Response
    {
        return $this->render('sites_iddees/sites-iddees.html.twig', [
            'controller_name' => 'SitesIddeesController',
        ]);
    }
}
