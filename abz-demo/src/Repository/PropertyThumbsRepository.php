<?php

namespace App\Repository;

use App\Entity\PropertyThumbs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PropertyThumbs|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropertyThumbs|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropertyThumbs[]    findAll()
 * @method PropertyThumbs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyThumbsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PropertyThumbs::class);
    }

//    /**
//     * @return PropertyThumbs[] Returns an array of PropertyThumbs objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PropertyThumbs
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
