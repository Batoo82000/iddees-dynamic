<?php

namespace App\Repository;

use App\Entity\HorairesMagasin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HorairesMagasin>
 *
 * @method HorairesMagasin|null find($id, $lockMode = null, $lockVersion = null)
 * @method HorairesMagasin|null findOneBy(array $criteria, array $orderBy = null)
 * @method HorairesMagasin[]    findAll()
 * @method HorairesMagasin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HorairesMagasinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HorairesMagasin::class);
    }

    //    /**
    //     * @return HorairesMagasin[] Returns an array of HorairesMagasin objects
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

    //    public function findOneBySomeField($value): ?HorairesMagasin
    //    {
    //        return $this->createQueryBuilder('h')
    //            ->andWhere('h.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
