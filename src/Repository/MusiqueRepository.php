<?php

namespace App\Repository;

use App\Entity\Musique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method Musique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Musique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Musique[]    findAll()
 * @method Musique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Musique::class);
    }

    public function findAllMusiques($page,$limit){
        $query = $this->createQueryBuilder('p')
        ->getQuery()
        ->setFirstResult(($page-1)*$limit)
        ->setMaxResults($limit);
        return new Paginator($query);
    }

    // /**
    //  * @return Musique[] Returns an array of Musique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Musique
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
