<?php

namespace App\Repository;

use App\Entity\SitesIddees;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SitesIddees>
 *
 * @method SitesIddees|null find($id, $lockMode = null, $lockVersion = null)
 * @method SitesIddees|null findOneBy(array $criteria, array $orderBy = null)
 * @method SitesIddees[]    findAll()
 * @method SitesIddees[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SitesIddeesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SitesIddees::class);
    }

    //    /**
    //     * @return SitesIddees[] Returns an array of SitesIddees objects
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

    //    public function findOneBySomeField($value): ?SitesIddees
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
