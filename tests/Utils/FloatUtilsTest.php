<?php declare(strict_types=1);

namespace App\Tests\Utils;

use App\Utils\FloatUtils;
use PHPUnit\Framework\TestCase;

/**
 * Class FloatUtilsTest
 *
 * @package App\Tests\Utils
 */
class FloatUtilsTest extends TestCase
{
    public function testRoundUpFloat()
    {
        $floatUtils = new FloatUtils();
        $number = 14.6667;
        $result = $floatUtils->roundUp($number);

        $this->assertInternalType('float', $result);
        $this->assertSame(14.67, $result);
    }
}
