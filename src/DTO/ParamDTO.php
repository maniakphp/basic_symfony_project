<?php declare(strict_types=1);

namespace App\DTO;

/**
 * Class ParamDTO
 *
 * @package App\DTO
 */
class ParamDTO
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $age;

    /**
     * ParamDTO constructor.
     *
     * @param null|string $age
     * @param null|string $name
     */
    public function __construct(?string $age, ?string $name = null)
    {
        $this->age  = $age;
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }
}