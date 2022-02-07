<?php

namespace App\Repository;

use App\Entity\Dialoguer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dialoguer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dialoguer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dialoguer[]    findAll()
 * @method Dialoguer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DialoguerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dialoguer::class);
    }

    // /**
    //  * @return Dialoguer[] Returns an array of Dialoguer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dialoguer
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
