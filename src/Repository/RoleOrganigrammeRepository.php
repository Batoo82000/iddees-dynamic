<?php

namespace App\Repository;

use App\Entity\RoleOrganigramme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RoleOrganigramme>
 *
 * @method RoleOrganigramme|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoleOrganigramme|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoleOrganigramme[]    findAll()
 * @method RoleOrganigramme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoleOrganigrammeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoleOrganigramme::class);
    }

    //    /**
    //     * @return RoleOrganigramme[] Returns an array of RoleOrganigramme objects
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

    //    public function findOneBySomeField($value): ?RoleOrganigramme
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
