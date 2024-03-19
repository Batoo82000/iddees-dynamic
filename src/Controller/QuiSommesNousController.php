<?php

namespace App\Controller;

use App\Entity\LocalisationSites;
use App\Entity\Organigramme;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuiSommesNousController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
        $this->entitymanager = $entityManager;
    }

    #[Route('/qui-sommes-nous', name: 'qui-sommes-nous')]
    public function index(): Response
    {
        $personnes = $this->entitymanager->getRepository(Organigramme::class)->findAll();
        $sites = $this->entitymanager->getRepository(LocalisationSites::class)->findAll();

        return $this->render('qui_sommes_nous/qui-sommes-nous.html.twig', [
            'personnes'=> $personnes,
            'sites'=> $sites
        ]);
    }
}
