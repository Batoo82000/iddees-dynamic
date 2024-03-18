<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuiSommesNousController extends AbstractController
{
    #[Route('/qui-sommes-nous', name: 'qui-sommes-nous')]
    public function index(): Response
    {
        return $this->render('qui_sommes_nous/qui-sommes-nous.html.twig', [
            'controller_name' => 'QuiSommesNousController',
        ]);
    }
}
