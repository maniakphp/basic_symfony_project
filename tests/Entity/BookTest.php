<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    /**
     * @var Book
     */
    private $entity;

    /**
     * @var array
     */
    private $provider;

    public function setUp()
    {
        $this->provider = [
            [
                'name'     => 'Zielona Mila',
                'bookDate' => new \DateTime('2012-05-12')
            ],
            [
                'name'     => 'Zielona Noga',
                'bookDate' => new \DateTime('2011-08-05')
            ],
        ];

        $this->entity = new Book(
            $this->provider[0]['name'],
            $this->provider[0]['bookDate']
        );
    }

    public function testConstruct()
    {
        $book = new Book(
            $this->provider[1]['name'],
            $this->provider[1]['bookDate']
        );

        $this->assertInstanceOf(Book::class, $book);
    }

    public function testGetName()
    {
        $name = $this->entity->getName();
        $this->assertSame($this->provider[0]['name'], $name);
        $this->assertNotSame($this->provider[1]['name'], $name);
    }

    public function testGetBookDate()
    {
        $bookDate = $this->entity->getBookDate();
        $this->assertSame($this->provider[0]['bookDate'], $bookDate);
        $this->assertNotSame($this->provider[1]['bookDate'], $bookDate);
    }
}
