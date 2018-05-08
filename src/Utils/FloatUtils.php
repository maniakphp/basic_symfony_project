<?php declare(strict_types=1);

namespace App\Utils;

/**
 * Class FloatUtils
 *
 * @package App\Utils
 */
class FloatUtils implements UtilsInterface
{
    /**
     * @param float $number
     *
     * @return float
     */
    public function roundUp(float $number): ?float
    {
        return ceil($number * 100) / 100;
    }
}