<?php

namespace App\Controller;

use AllowDynamicProperties;
use App\Entity\SocialNetwork;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[AllowDynamicProperties] class SocialNetworkController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
        $this->entitymanager = $entityManager;
    }
    #[Route('/social-network', name: 'social-network')]
    public function index(): Response
    {
        $content = $this->entitymanager->getRepository(SocialNetwork::class)->findAll();
        return $this->render('social_network/social-network.html.twig', [
            'content' => $content,
        ]);
    }
}
