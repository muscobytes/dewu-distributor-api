<?php

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\FromArray;
use Muscobytes\Poizon\DistributionApiClient\Traits\ToArray;

class SpuListResponse implements DtoInterface
{
    use ToArray;
    use FromArray;

    public function __construct(
        public int $code,
        public string $msg,
        public SpuListData $data,
    )
    {
        //
    }
}
