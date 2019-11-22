<?php

namespace App\Repository;

use App\Entity\Nivdisci;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Nivdisci|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nivdisci|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nivdisci[]    findAll()
 * @method Nivdisci[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NivdisciRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Nivdisci::class);
    }

    // /**
    //  * @return Nivdisci[] Returns an array of Nivdisci objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Nivdisci
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
