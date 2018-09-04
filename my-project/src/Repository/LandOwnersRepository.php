<?php

namespace App\Repository;

use App\Entity\LandOwners;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LandOwners|null find($id, $lockMode = null, $lockVersion = null)
 * @method LandOwners|null findOneBy(array $criteria, array $orderBy = null)
 * @method LandOwners[]    findAll()
 * @method LandOwners[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LandOwnersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LandOwners::class);
    }

//    /**
//     * @return LandOwners[] Returns an array of LandOwners objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LandOwners
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
