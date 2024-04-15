<?php

namespace App\Repository;

use App\Entity\OngletsOrganigramme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OngletsOrganigramme>
 *
 * @method OngletsOrganigramme|null find($id, $lockMode = null, $lockVersion = null)
 * @method OngletsOrganigramme|null findOneBy(array $criteria, array $orderBy = null)
 * @method OngletsOrganigramme[]    findAll()
 * @method OngletsOrganigramme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OngletsOrganigrammeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OngletsOrganigramme::class);
    }

    //    /**
    //     * @return OngletsOrganigramme[] Returns an array of OngletsOrganigramme objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?OngletsOrganigramme
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
