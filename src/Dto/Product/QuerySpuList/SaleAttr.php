<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Postfriday\Castable\Traits\ToArray;

class SaleAttr implements DtoInterface
{
    use ToArray;
    use FromArray;

    /**
     * @param string $level Sorting level
     * @param string $cnName Chinese name
     * @param string $enName English name
     * @param string $cnValue Chinese value
     * @param string $enValue English value
     */
    public function __construct(
        public string $level,
        public string $cnName,
        public string $enName,
        public string $cnValue,
        public string $enValue,
    )
    {
        //
    }
}
