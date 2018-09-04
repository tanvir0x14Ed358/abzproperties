<?php

namespace App\Repository;

use App\Entity\HomeImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HomeImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method HomeImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method HomeImages[]    findAll()
 * @method HomeImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomeImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HomeImages::class);
    }

//    /**
//     * @return HomeImages[] Returns an array of HomeImages objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HomeImages
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
