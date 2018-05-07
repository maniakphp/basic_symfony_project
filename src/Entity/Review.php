<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reviews
 *
 * @ORM\Table(
 *     name="reviews",
 *     indexes={@ORM\Index(name="book_id", columns={"book_id"})}
 *     )
 * @ORM\Entity
 */
class Reviews
{
    public const MALE = 'm';
    public const FEMALE = 'f';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=0, nullable=false)
     */
    private $sex;

    /**
     * @var Book
     *
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     * })
     */
    private $book;

    /**
     * Reviews constructor.
     *
     * @param int    $age
     * @param string $sex
     * @param Book   $book
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(int $age, string $sex, Book $book)
    {
        if (!in_array($sex, [self::MALE, self::FEMALE])) {
            throw new \InvalidArgumentException('Wrong sex type');
        }
        $this->age  = $age;
        $this->sex  = $sex;
        $this->book = $book;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        return $this->book;
    }
}
