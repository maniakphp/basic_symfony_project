<?php declare(strict_types=1);

namespace App\Utils;

use App\DTO\ParamDTO;

/**
 * Class ParamParser
 *
 * @package App\Utils
 */
class ParamParser implements UtilsInterface
{

    /**
     * @param string $params
     *
     * @return ParamDTO
     */
    public function prepareParams(string $params): ParamDTO
    {
        $params = explode('|', $params);
        $name   = ucwords(strtolower(trim($params[0])));
        $age    = $params[1];

        return new ParamDTO($age, $name);
    }
}