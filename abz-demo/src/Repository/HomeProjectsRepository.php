<?php

namespace App\Repository;

use App\Entity\HomeProjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HomeProjects|null find($id, $lockMode = null, $lockVersion = null)
 * @method HomeProjects|null findOneBy(array $criteria, array $orderBy = null)
 * @method HomeProjects[]    findAll()
 * @method HomeProjects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomeProjectsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HomeProjects::class);
    }

//    /**
//     * @return HomeProjects[] Returns an array of HomeProjects objects
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
    public function findOneBySomeField($value): ?HomeProjects
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
