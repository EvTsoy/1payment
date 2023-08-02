<?php

namespace App\Repository;

use App\Entity\Value;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Value>
 *
 * @method Value|null find($id, $lockMode = null, $lockVersion = null)
 * @method Value|null findOneBy(array $criteria, array $orderBy = null)
 * @method Value[]    findAll()
 * @method Value[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Value::class);
    }

    public function findIdOfRange(int $value): ?Value
    {
        return $this->createQueryBuilder('v')
            ->andWhere(':val >= v.min and :val <= v.max')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

//    /**
//     * @return Value[] Returns an array of Value objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Value
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
