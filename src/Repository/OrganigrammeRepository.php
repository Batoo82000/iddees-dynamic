<?php

namespace App\Repository;

use App\Entity\Organigramme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Organigramme>
 *
 * @method Organigramme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Organigramme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Organigramme[]    findAll()
 * @method Organigramme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrganigrammeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Organigramme::class);
    }

    //    /**
    //     * @return Organigramme[] Returns an array of Organigramme objects
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

    //    public function findOneBySomeField($value): ?Organigramme
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
