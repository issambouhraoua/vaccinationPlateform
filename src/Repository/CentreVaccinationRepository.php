<?php

namespace App\Repository;

use App\Entity\CentreVaccination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CentreVaccination|null find($id, $lockMode = null, $lockVersion = null)
 * @method CentreVaccination|null findOneBy(array $criteria, array $orderBy = null)
 * @method CentreVaccination[]    findAll()
 * @method CentreVaccination[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentreVaccinationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CentreVaccination::class);
    }

    // /**
    //  * @return CentreVaccination[] Returns an array of CentreVaccination objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CentreVaccination
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
