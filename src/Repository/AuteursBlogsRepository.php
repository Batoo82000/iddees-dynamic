<?php

namespace App\Repository;

use App\Entity\AuteursBlogs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AuteursBlogs>
 *
 * @method AuteursBlogs|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuteursBlogs|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuteursBlogs[]    findAll()
 * @method AuteursBlogs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuteursBlogsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AuteursBlogs::class);
    }

    //    /**
    //     * @return AuteursBlogs[] Returns an array of AuteursBlogs objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AuteursBlogs
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
