<?php

namespace App\Repository;

use App\Entity\Bien;
use App\Entity\PropertySearch;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Bien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bien[]    findAll()
 * @method Bien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bien::class);
    }

    // /**
    //  * @return Bien[] Returns an array of Bien objects
    //  */
    
  /*   public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    
 */
    /*  public function findSearch(Filtres $recherche): PaginationInterface
    {

        $query = $this
        ->createQueryBuilder('p')
        ->select('c', 'p')
        ->join('p.filtres', 'c');

    if (!empty($recherche->idTypeAnnonce)) {
        $query = $query
            ->andWhere('p.name LIKE :idTypeAnnonce')
            ->setParameter('idTypeAnnonce', "%{$recherche->idTypeAnnonce}%");
    }

    if (!empty($recherche->idType)) {
        $query = $query
            ->andWhere('p.name LIKE :idType')
            ->setParameter('idType', "%{$recherche->idType}%");
    }

    if (!empty($recherche->minSurface)) {
        $query = $query
            ->andWhere('p.surface >= :minSurface')
            ->setParameter('minSurface', $recherche->minSurface);
    }

    if (!empty($recherche->prixMax)) {
        $query = $query
            ->andWhere('p.prix <= :prixMax')
            ->setParameter('prixMax', $recherche->prixMax);
    }

    

    if (!empty($recherche->filtres)) {
        $query = $query
            ->andWhere('c.id IN (:filtres)')
            ->setParameter('filtres', $recherche->filtres);
    }
   

    $query = $this->getSearchQuery($recherche)->getQuery();
     return $this->paginator->paginate(
        $query,
        $recherche->page,
        9 
    );
}
 */


    
public function selectInterval($from, $to, $typeB, $typeA)
{
  /*   $query = $this->getEntityManager()->createQuery("
    SELECT b FROM `App\Entity\Bien b 
    LEFT JOIN type_annonce ta on ta.id_type_annonce = b.id_type_annonce
    LEFT JOIN type_Bien tb on tb.id_type = b.id_type
    WHERE b.dateParution > :from b.dateParution < 
    :to AND ta.id_type_annonce = 2 AND tb.id_type = 1
    ")
    
    return $query->getResult(); */
    $query = $this->createQueryBuilder('b') //  SELECT b FROM `App\Entity\Bien b 
       ->where('b.dateParution > :from')    //  WHERE b.dateParution :from 
       ->andWhere('b.dateParution < :to')   //  and b.dateParution < :to
       ->setParameter(':from', $from)       // definir :from
       ->setParameter(':to', $to);          // definir :to
    if($typeA != null ){
        $query->leftJoin('b.idTypeAnnonce', 'ta') //  LEFT JOIN type_annonce ta on ta.id_type_annonce = b.id_type_annonce
              ->andWhere('ta.idTypeAnnonce = :typeA')
              ->setParameter(':typeA', $typeA);
    }
    if($typeB != null ){                        
        $query->leftJoin('b.idType', 'tb')    //  LEFT JOIN type_Bien tb on tb.id_type = b.id_type
              ->andWhere('tb.idType = :typeB')
              ->setParameter(':typeB', $typeB);
    }
    return $query->getQuery()->getResult();
}

  




    /*   $query = $this->findByAllVisibleQuery();

      if($recherche->getMinSurface()){
        $query = $query
          ->andWhere('p.surface >= :minsurface')
          ->setParameter('minsurface', $recherche->getMinSurface());
    }

      if($recherche->getPrixMax()){
          $query = $query
            ->andWhere('p.prix <= :prixmax')
            ->setParameter('primax', $recherche->getPrixMax());
      }
        return $query ->getQuery(); 
    }*/
  /*   public function findBy(PropertySearch $search): ?Bien
    {
        $query = $this->findBy();
           

        if ($search->getPrixMax()) {
            $query = $query
            ->andWhere('p.prix <= :prixmax')
            ->setParameter('primax', $search->getPrixMax());
        }

        if ($search->getMinSurface()) {
            $query = $query
            ->andWhere('p.surface >= :minsurface')
            ->setParameter('minsurface', $search->getMinSurface());
        }

           return $query->getQuery()
        ;
    }
     */


    /**
     * Returns all Annonces per page
     * @return void
     * 
     **/ 
     public function getPaginatedAnnonces($page, $limit, $filters = null){
        $query = $this->createQueryBuilder('b')
            ->where('b.active = 1')
            ->setFirstresult(($page * $limit) - $limit)
            ->setMaxResults($limit);

        // On filtre les données
       /*  if($filters!= null ) {
            $query->andWhere('a.typeBien IN(:TB)', 'b.typeAnnonce IN(:TA)')
                ->setParameter(':TB',':TA', array_values($filters));
        }

        $query->orderBy('a.created_at')
            ->setFirstResult(($page * $limit) - $limit)
            ->setMaxResults($limit)
        ; */
        return $query->getQuery()->getResult();
    }
     

    public function getTotalAnnonces(){
        $query = $this->createQueryBuilder('b')
                ->select('COUNT(b)')
                ->where('b.active = 1');
        return $query->getQuery()->getSingleScalarResult();
    }

   
     private function getSearchQuery(Filtres $recherche, $ignorePrice = false): QueryBuilder
     {
     }




}
