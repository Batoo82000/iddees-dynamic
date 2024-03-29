<?php

namespace App\Repository;

use App\Entity\SourcesBlog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SourcesBlog>
 *
 * @method SourcesBlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method SourcesBlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method SourcesBlog[]    findAll()
 * @method SourcesBlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SourcesBlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SourcesBlog::class);
    }

    //    /**
    //     * @return SourcesBlog[] Returns an array of SourcesBlog objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SourcesBlog
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
