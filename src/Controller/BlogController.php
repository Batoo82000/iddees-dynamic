<?php

namespace App\Controller;

use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
        $this->entitymanager = $entityManager;
    }

    #[Route('/blog', name: 'blog')]
    public function index(): Response
    {
        $blogs = $this->entitymanager->getRepository(Blog::class)->findall();

        return $this->render('blog/blog.html.twig', [
            'blogs' => $blogs,
        ]);
    }
    #[Route('/blog/{slug}', name: 'blog_show')]
    public function show($slug): Response
    {
        $blog = $this->entitymanager->getRepository(Blog::class)->findOneBySlug($slug);

        return $this->render('blog/blog.html.twig', [
            'blog' => $blog,
        ]);
    }
}
