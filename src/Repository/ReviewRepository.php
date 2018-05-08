<?php declare(strict_types=1);

namespace App\Repository;

use App\DTO\ParamDTO;
use App\Entity\Book;
use App\Entity\Review;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class ReviewRepository
 *
 * @package App\Repository
 */
class ReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Review::class);
    }

    /**
     * @param ParamDTO $params
     *
     * @return mixed
     */
    public function findByNameAndAge(ParamDTO $params)
    {
        $age = $params->getAge();

        return $this
            ->createQueryBuilder('r')
            ->select('b.name, b.bookDate')
            ->addSelect("(SELECT AVG(r1.age) FROM App\Entity\Review r1 WHERE r1.book = b.id AND r1.{$age} AND r1.sex='f') as avg_female")
            ->addSelect("(SELECT AVG(r2.age) FROM App\Entity\Review r2 WHERE r2.book = b.id AND r2.{$age} AND r2.sex='m') as avg_male")
            ->join(Book::class, 'b')
            ->where('b.name = :name')
            ->setParameter('name', $params->getName())
            ->andWhere('r.' . $age)
            ->groupBy('b.id')
            ->getQuery()
            ->getResult();
    }


    /**
     * @param ParamDTO $param
     *
     * @return mixed
     */
    public function findByAge(ParamDTO $param)
    {
        $age = $param->getAge();

        return $this->createQueryBuilder('r')
                    ->select('b.name, b.bookDate')
                    ->addSelect("(SELECT AVG(r1.age) FROM App\Entity\Review r1 WHERE r1.book = b.id AND r1.{$age} AND r1.sex='f') as avg_female")
                    ->addSelect("(SELECT AVG(r2.age) FROM App\Entity\Review r2 WHERE r2.book = b.id AND r2.{$age} AND r2.sex='m') as avg_male")
                    ->join(Book::class, 'b')
                    ->where('r.' . $age)
                    ->andWhere("(
                    (SELECT AVG(r3.age) FROM App\Entity\Review r3 WHERE r3.book = b.id AND r3.{$age} AND r3.sex='f') >= 0
                        OR
                        (SELECT AVG(r4.age) FROM App\Entity\Review r4 WHERE r4.book = b.id AND r4.{$age} AND r4.sex='m') >= 0
                        )"
                    )
                    ->groupBy('b.id')
                    ->getQuery()
                    ->getResult();
    }
}