<?php declare(strict_types=1);

namespace App\DTO;

/**
 * Class StatisticDTO
 *
 * @package App\DTO
 */
class StatisticDTO
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $compatibility;

    /**
     * @var \DateTime
     */
    protected $bookDate;

    /**
     * @var float
     */
    protected $avgFemale;

    /**
     * @var float
     */
    protected $avgMale;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return StatisticDTO
     */
    public function setName(string $name): StatisticDTO
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getCompatibility(): float
    {
        return $this->compatibility;
    }

    /**
     * @param float $compatibility
     *
     * @return StatisticDTO
     */
    public function setCompatibility(float $compatibility): StatisticDTO
    {
        $this->compatibility = $compatibility;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBookDate(): \DateTime
    {
        return $this->bookDate;
    }

    /**
     * @param \DateTime $bookDate
     *
     * @return StatisticDTO
     */
    public function setBookDate(\DateTime $bookDate): StatisticDTO
    {
        $this->bookDate = $bookDate;

        return $this;
    }

    /**
     * @return float
     */
    public function getAvgFemale(): float
    {
        return $this->avgFemale;
    }

    /**
     * @param float $avgFemale
     *
     * @return StatisticDTO
     */
    public function setAvgFemale(float $avgFemale): StatisticDTO
    {
        $this->avgFemale = $avgFemale;

        return $this;
    }

    /**
     * @return float
     */
    public function getAvgMale(): float
    {
        return $this->avgMale;
    }

    /**
     * @param float $avgMale
     *
     * @return StatisticDTO
     */
    public function setAvgMale(float $avgMale): StatisticDTO
    {
        $this->avgMale = $avgMale;

        return $this;
    }
}