<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz
 * Date: 29.04.2018
 * Time: 21:10
 */

namespace App\Tests\Repository;

use App\Entity\Book;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BookRepositoryTest extends KernelTestCase
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

    public function testFindByNameAndAge()
    {
        $result = $this->entityManager
            ->getRepository(Book::class)
            ->findByNameAndAge('Zielona Mila', 'age<30');
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
