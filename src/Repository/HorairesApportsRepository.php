<?php

namespace App\Repository;

use App\Entity\HorairesApports;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HorairesApports>
 *
 * @method HorairesApports|null find($id, $lockMode = null, $lockVersion = null)
 * @method HorairesApports|null findOneBy(array $criteria, array $orderBy = null)
 * @method HorairesApports[]    findAll()
 * @method HorairesApports[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HorairesApportsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HorairesApports::class);
    }

    //    /**
    //     * @return HorairesApports[] Returns an array of HorairesApports objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('h')
    //            ->andWhere('h.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('h.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?HorairesApports
    //    {
    //        return $this->createQueryBuilder('h')
    //            ->andWhere('h.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
