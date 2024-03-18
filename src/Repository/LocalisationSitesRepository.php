<?php

namespace App\Repository;

use App\Entity\LocalisationSites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LocalisationSites>
 *
 * @method LocalisationSites|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocalisationSites|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocalisationSites[]    findAll()
 * @method LocalisationSites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocalisationSitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocalisationSites::class);
    }

    //    /**
    //     * @return LocalisationSites[] Returns an array of LocalisationSites objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LocalisationSites
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
