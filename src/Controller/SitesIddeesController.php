<?php

namespace App\Controller;

use App\Entity\SitesIddees;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SitesIddeesController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
        $this->entitymanager = $entityManager;
    }
    #[Route('/sites-iddees', name: 'sites_iddees')]
    public function index(): Response
    {
        $sitesIddees = $this->entitymanager->getRepository(SitesIddees::class)->findAll();
        return $this->render('sites_iddees/sites-iddees.html.twig', [
            'sitesIddees' => $sitesIddees,
        ]);
    }
    #[Route('/site-iddees/{id}', name: 'site_iddees_show')]
    public function show($id): Response
    {
        $siteIddees = $this->entitymanager->getRepository(SitesIddees::class)->findOneById($id);
        return $this->render('sites_iddees/site-iddees-show.html.twig', [
            'siteIddees' => $siteIddees,
        ]);
    }
}
