<?php

namespace App\Repository;

use App\Classe\SearchBlogs;
use App\Entity\Blog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Blog>
 *
 * @method Blog|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blog|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blog[]    findAll()
 * @method Blog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogRepository extends ServiceEntityRepository // La classe ProductRepository étend ServiceEntityRepository, qui est fournie par Doctrine pour faciliter l'accès aux entités dans la base de données.
{
    public function __construct(ManagerRegistry $registry)// Dans le constructeur de la classe, la méthode __construct() est appelée avec deux arguments : le ManagerRegistry et la classe de l'entité gérée, dans ce cas Blog. Cela initialise le repository en utilisant le registre de gestionnaires d'entités (ManagerRegistry) et la classe de l'entité Blog.
    {
        parent::__construct($registry, Blog::class);
    }
    public function findWithSearch(SearchBlogs $search): array // La méthode nommée findWithSearch est définie. Elle prend un objet de type Search comme argument et renvoie un tableau de blogs correspondant aux critères de recherche.
    {
        // Une requête de type QueryBuilder est créée en utilisant la méthode createQueryBuilder(). Cette méthode crée une requête pour sélectionner des objets de l'entité Blog (représentés par la lettre 'b' dans la requête) ainsi que des objets de l'entité Themes (représentés par la lettre 't' dans la requête).
        $query = $this
            ->createQueryBuilder('b')
            ->select('t', 'b')
            ->join('b.themes', 't'); // Ici, une jointure est faite entre la table Blog et la table ThemesBlogs

        // La méthode vérifie si des catégories ont été sélectionnées dans l'objet Search. Si c'est le cas, elle ajoute une clause WHERE à la requête pour filtrer les produits en fonction des catégories sélectionnées.
        if(!empty($search->themes)){
            $query = $query
                ->andWhere('t.id in (:themes)')
                ->setParameter('themes', $search->themes);
        }
        // La méthode exécute la requête en appelant getQuery() pour obtenir l'objet Query correspondant à la requête construite, puis getResult() pour obtenir les résultats de la requête sous forme de tableau de blogs.
        return $query->getQuery()->getResult();
    }

    //    /**
    //     * @return Blog[] Returns an array of Blog objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Blog
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
