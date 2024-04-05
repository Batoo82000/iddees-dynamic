<?php

namespace App\Controller;

use AllowDynamicProperties;
use App\Entity\Accueil;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[AllowDynamicProperties] class AccueilController extends AbstractController
{
public function __construct(EntityManagerInterface $entityManager){
    $this->entitymanager = $entityManager;
}
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        $accueil = $this->entitymanager->getRepository(Accueil::class)->findAll();
        return $this->render('accueil/accueil.html.twig', [
            'accueil'=> $accueil,
        ]);
    }
}
