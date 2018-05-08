<?php

namespace App\Tests\Repository;

use App\DTO\ParamDTO;
use App\Entity\Book;
use App\Entity\Review;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ReviewRepositoryTest extends KernelTestCase
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel              = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
                                      ->get('doctrine')
                                      ->getManager();
    }

    public function testFindByNameAndAgeWithResult()
    {
        $result = $this->entityManager
            ->getRepository(Review::class)
            ->findByNameAndAge(new ParamDTO('age>30', 'Zielona Mila'));

        $this->assertCount(1, $result);
    }

    public function testFindByNameAndAgeNoResult()
    {
        $result = $this->entityManager
            ->getRepository(Review::class)
            ->findByNameAndAge(new ParamDTO('age>30', 'Zielono Mi'));

        $this->assertCount(0, $result);
    }

    public function testFindByAgeWithResult()
    {
        $result = $this->entityManager
            ->getRepository(Review::class)
            ->findByAge(new ParamDTO('age<30'));

        $this->assertCount(5, $result);
    }

    public function testFindByAgeNoResult()
    {
        $result = $this->entityManager
            ->getRepository(Review::class)
            ->findByAge(new ParamDTO('age<5'));

        $this->assertCount(0, $result);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }
}
