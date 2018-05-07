<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz
 * Date: 29.04.2018
 * Time: 19:01
 */

namespace App\Tests\Entity;

use App\Entity\Book;
use App\Entity\Reviews;
use PHPUnit\Framework\TestCase;

class ReviewsTest extends TestCase
{
    /**
     * @var Reviews
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
                'sex'  => Reviews::MALE,
                'book' => $this->createMock(Book::class),
            ],
            [
                'age'  => 55,
                'sex'  => Reviews::FEMALE,
                'book' => $this->createMock(Book::class),
            ],
        ];
        $this->entity   = new Reviews(
            $this->provider[0]['age'],
            $this->provider[0]['sex'],
            $this->provider[0]['book']
        );
    }

    public function testConstruct()
    {
        $reviews = new Reviews(
            $this->provider[1]['age'],
            $this->provider[1]['sex'],
            $this->provider[1]['book']
        );

        $this->assertInstanceOf(Reviews::class, $reviews);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Wrong sex type
     */
    public function testConstructInvalidSexValue()
    {
        $reviews = new Reviews(
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
