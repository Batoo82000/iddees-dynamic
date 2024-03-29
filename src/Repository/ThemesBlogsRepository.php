<?php

namespace App\Repository;

use App\Entity\ThemesBlogs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ThemesBlogs>
 *
 * @method ThemesBlogs|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThemesBlogs|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThemesBlogs[]    findAll()
 * @method ThemesBlogs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThemesBlogsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ThemesBlogs::class);
    }

    //    /**
    //     * @return ThemesBlogs[] Returns an array of ThemesBlogs objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ThemesBlogs
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
