<?php

namespace App\Controller;

use AllowDynamicProperties;
use App\Entity\Partners;
use App\Entity\PartnersCategories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[AllowDynamicProperties] class PartnersController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
        $this->entitymanager = $entityManager;
    }

    #[Route('/partners', name: 'partners')]
    public function index(): Response
    {
        $partners = $this->entitymanager->getRepository(Partners::class)->findAll();
        $partnersCategories = $this->entitymanager->getRepository(PartnersCategories::class)->findAll();
        return $this->render('partners/index.html.twig', [
            'partners' => $partners,
            'categories' => $partnersCategories
        ]);
    }
}
