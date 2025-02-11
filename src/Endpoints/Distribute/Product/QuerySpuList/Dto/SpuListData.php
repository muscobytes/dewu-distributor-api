<?php

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\FromArray;
use Muscobytes\Poizon\DistributionApiClient\Traits\ToArray;

class SpuListData implements DtoInterface
{
    use ToArray;
    use FromArray;

    /**
     * @param int $total
     * @param array<Spu> $spuList
     */
    public function __construct(
        public int $total,
        public array $spuList
    )
    {
        //
    }
}
