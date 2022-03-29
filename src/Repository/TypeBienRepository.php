<?php

namespace App\Repository;

use App\Entity\TypeBien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeBien|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeBien|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeBien[]    findAll()
 * @method TypeBien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeBienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeBien::class);
    }

    // /**
    //  * @return TypeBien[] Returns an array of TypeBien objects
    //  */
   /*  
    public function findByLibelleType($idBien)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.idBien = :v')
            ->setParameter('val', $value)
            ->orderBy('t.idType', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
     */

    /*
    public function findOneBySomeField($value): ?TypeBien
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
