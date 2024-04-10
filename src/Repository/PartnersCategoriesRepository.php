<?php

namespace App\Repository;

use App\Entity\PartnersCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PartnersCategories>
 *
 * @method PartnersCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartnersCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartnersCategories[]    findAll()
 * @method PartnersCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartnersCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartnersCategories::class);
    }

    //    /**
    //     * @return PartnersCategories[] Returns an array of PartnersCategories objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PartnersCategories
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
