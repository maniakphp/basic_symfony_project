<?php declare(strict_types=1);

namespace App\Tests\Utils;

use App\DTO\ParamDTO;
use App\Utils\ParamParser;
use PHPUnit\Framework\TestCase;

class ParamParserTest extends TestCase
{

    public function testPrepareParamsReturnObject()
    {
        $parser = new ParamParser();
        $result = $parser->prepareParams('KróL LEw|age<13');

        $this->assertInstanceOf(ParamDTO::class, $result);
    }
}
