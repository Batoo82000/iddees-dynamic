<?php

namespace App\Controller;

use AllowDynamicProperties;
use App\Entity\RGPD;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[AllowDynamicProperties] class RGPDController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
    $this->entitymanager = $entityManager;
}
    #[Route('/RGPD', name: 'RGPD')]
    public function index(): Response
    {
        $content = $this->entitymanager->getRepository(RGPD::class)->findAll();
        return $this->render('rgpd/RGPD.html.twig', [
            'content' => $content,
        ]);
    }
}
