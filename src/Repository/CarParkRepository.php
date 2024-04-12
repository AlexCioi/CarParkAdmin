<?php

namespace App\Repository;

use App\Entity\CarPark;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarPark>
 *
 * @method CarPark|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarPark|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarPark[]    findAll()
 * @method CarPark[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarParkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarPark::class);
    }

    //    /**
    //     * @return CarPark[] Returns an array of CarPark objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CarPark
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
