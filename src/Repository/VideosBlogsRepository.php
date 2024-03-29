<?php

namespace App\Repository;

use App\Entity\VideosBlogs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VideosBlogs>
 *
 * @method VideosBlogs|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideosBlogs|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideosBlogs[]    findAll()
 * @method VideosBlogs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideosBlogsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideosBlogs::class);
    }

    //    /**
    //     * @return VideosBlogs[] Returns an array of VideosBlogs objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('v.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?VideosBlogs
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
