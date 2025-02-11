<?php

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\ToArray;

class SpuListResponse implements DtoInterface
{
    use ToArray;
    use FromArray;

    public function __construct(
        public int $code,
        public string $msg,
        public SpuListData $data,
        public int $status
    )
    {
        //
    }
}
