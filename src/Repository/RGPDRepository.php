<?php

namespace App\Repository;

use App\Entity\RGPD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RGPD>
 *
 * @method RGPD|null find($id, $lockMode = null, $lockVersion = null)
 * @method RGPD|null findOneBy(array $criteria, array $orderBy = null)
 * @method RGPD[]    findAll()
 * @method RGPD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RGPDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RGPD::class);
    }

    //    /**
    //     * @return RGPD[] Returns an array of RGPD objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RGPD
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
