<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Book;
use App\Entity\Review;
use PHPUnit\Framework\TestCase;

class ReviewTest extends TestCase
{
    /**
     * @var Review
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
                'age'  => 22,
                'sex'  => Review::MALE,
                'book' => $this->createMock(Book::class),
            ],
            [
                'age'  => 55,
                'sex'  => Review::FEMALE,
                'book' => $this->createMock(Book::class),
            ],
        ];
        $this->entity   = new Review(
            $this->provider[0]['age'],
            $this->provider[0]['sex'],
            $this->provider[0]['book']
        );
    }

    public function testConstruct()
    {
        $reviews = new Review(
            $this->provider[1]['age'],
            $this->provider[1]['sex'],
            $this->provider[1]['book']
        );

        $this->assertInstanceOf(Review::class, $reviews);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Wrong sex type
     */
    public function testConstructInvalidSexValue()
    {
        $reviews = new Review(
            $this->provider[1]['age'],
            'pies',
            $this->provider[1]['book']
        );
    }

    public function testGetAge()
    {
        $age = $this->entity->getAge();
        $this->assertSame($this->provider[0]['age'], $age);
        $this->assertNotSame($this->provider[1]['age'], $age);
    }

    public function testGetSex()
    {
        $sex = $this->entity->getSex();
        $this->assertSame($this->provider[0]['sex'], $sex);
        $this->assertNotSame($this->provider[1]['sex'], $sex);
    }

    public function testGetBook()
    {
        $book = $this->entity->getBook();
        $this->assertSame($this->provider[0]['book'], $book);
        $this->assertNotSame($this->provider[1]['book'], $book);
    }
}
