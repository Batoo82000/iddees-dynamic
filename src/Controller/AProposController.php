<?php

namespace App\Controller;

use AllowDynamicProperties;
use App\Entity\APropos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[AllowDynamicProperties] class AProposController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
    $this->entitymanager = $entityManager;
    }
    #[Route('/a-propos', name: 'a-propos')]
    public function index(): Response
    {
        $content = $this->entitymanager->getRepository(APropos::class)->findAll();
        return $this->render('a_propos/a-propos.html.twig', [
            'content' => $content
        ]);
    }
}
