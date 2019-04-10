<?php

namespace App\Repository;

use App\Entity\Advert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Advert|null find($id, $lockMode = null, $lockVersion = null)
 * @method Advert|null findOneBy(array $criteria, array $orderBy = null)
 * @method Advert[]    findAll()
 * @method Advert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvertRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Advert::class);
    }

    // /**
    //  * @return Advert[] Returns an array of Advert objects
    //  */


    /*public function findThree()
    {
        return $this->createQueryBuilder('a')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }*/

    public function findByDate($search1, $search2)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.date BETWEEN :start AND :end')
            ->setParameter('start', new \Datetime($search1))
            ->setParameter('end', new \Datetime($search2))
            ->setMaxResults(3)
            ->getQuery()
            ->getResult()
            ;
    }

    /*public function limites($data){
        $min_keys = array_search(min($data), $data);
        $max_keys = array_search(max($data), $data);

        $date1 = 'la premiere date est '.$data[$min_keys]->getDate()->format('Y:m:d');
        $date2 = 'la derniere date est '.$data[$max_keys]->getDate()->format('Y:m:d');
        return array($date1, $date2);

    }*/

    /*

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Advert
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
