<?php

namespace App\Controller;

use AllowDynamicProperties;
use App\Classe\SearchBlogs;
use App\Entity\Blog;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[AllowDynamicProperties] class BlogController extends AbstractController
{
    private $paginator;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entitymanager = $entityManager;
    }

    #[Route('/blog', name: 'blog')]
    public function index(Request $request, PaginatorInterface $paginatorInterface): Response
    {
        $search = new SearchBlogs(); // Dans cette méthode, un objet SearchBlogs est instancié. Cet objet est utilisé pour stocker les données de recherche provenant du formulaire.
        $form = $this->createForm(SearchType::class, $search); // Un formulaire est créé en utilisant la méthode $this->createForm(). On utilise le type de formulaire SearchType défini précédemment, et on lui passe l'objet Search comme donnée.

        $form->handleRequest($request); // '$form->handleRequest($request)' est appelée pour que le formulaire traite la requête HTTP actuelle. Cela permet de mettre à jour l'objet SearchBlogs avec les données soumises par le formulaire, si elles existent.

        if($form->isSubmitted() && $form->isValid()) { // On vérifie si le formulaire a été soumis et est valide en utilisant $form->isSubmitted() et $form->isValid(). Si c'est le cas, cela signifie que l'utilisateur a soumis le formulaire et que les données sont valides.
            $blogs = $this->entitymanager->getRepository(Blog::class)->findWithSearch($search); // Une recherche de produits est effectuée en utilisant la méthode findWithSearch() de l'objet BlogRepository, en passant l'objet SearchBlogs comme paramètre.
        } else { // Si le formulaire n'a pas été soumis ou n'est pas valide, cela signifie que l'utilisateur n'a pas encore soumis de formulaire ou que les données soumises ne sont pas valides. Dans ce cas, tous les blogs sont récupérés en utilisant la méthode findBy() de l'objet BlogsRepository, et sont classés par ordre décroissant.
            $blogs = $this->entitymanager->getRepository(Blog::class)->findBy([], ['created_at' => 'DESC']);
        }
            $posts = $paginatorInterface->paginate(
            $blogs,
            $request->query->getInt('page', 1),
            8
        );

        return $this->render('blog/blog.html.twig', [ // La méthode render() est utilisée pour afficher le template 'blog/blog.html.twig'. Les produits récupérés sont transmis au template sous le nom 'blogs', et le formulaire créé est transmis sous le nom 'form'.
            'blogs' => $blogs,
            'form'=> $form->createView(),
            'posts'=>$posts
        ]);
    }
    #[Route('/blog/{slug}', name: 'blog_show')]
    public function show($slug): Response
    {
        $blog = $this->entitymanager->getRepository(Blog::class)->findOneBySlug($slug);
        return $this->render('blog/blog-show.html.twig', [
            'blog' => $blog,
        ]);
    }
}
