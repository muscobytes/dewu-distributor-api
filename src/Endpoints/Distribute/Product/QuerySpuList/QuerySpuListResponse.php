<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Response;
use Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList\SpuListResponse;

class QuerySpuListResponse extends Response
{
    public function getResponseDtoClassName(): string
    {
        return SpuListResponse::class;
    }
}
