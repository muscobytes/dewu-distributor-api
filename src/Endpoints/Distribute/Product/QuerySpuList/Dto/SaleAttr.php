<?php

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\ToArray;

class SaleAttr implements DtoInterface
{
    use ToArray;
    use FromArray;

    /**
     * @param string $level
     * @param string $cnName
     * @param string $enName
     * @param string $cnValue
     * @param string $enValue
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
