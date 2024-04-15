<?php

namespace App\Controller;

use AllowDynamicProperties;
use App\Entity\MentionsLegales;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[AllowDynamicProperties] class MentionsLegalesController extends AbstractController
{ public function __construct(EntityManagerInterface $entityManager){
    $this->entitymanager = $entityManager;
}
    #[Route('/mentions-legales', name: 'mentions-legales')]
    public function index(): Response
    {$content = $this->entitymanager->getRepository(MentionsLegales::class)->findAll();
        return $this->render('mentions_legales/mentions-legales.html.twig', [
            'content' => $content
        ]);
    }
}
