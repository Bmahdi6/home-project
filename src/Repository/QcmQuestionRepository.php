<?php

namespace App\Repository;

use App\Entity\QcmQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method QcmQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method QcmQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method QcmQuestion[]    findAll()
 * @method QcmQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QcmQuestionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, QcmQuestion::class);
    }

    // /**
    //  * @return QcmQuestion[] Returns an array of QcmQuestion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QcmQuestion
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
