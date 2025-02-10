<?php

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Dto;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;

class SpuList extends Dto
{
    public function __construct()
    {
        //
    }

    public static function fromArray(array $data): DtoInterface
    {
        return new self($data);
    }
}
