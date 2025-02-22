<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySkuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Response;
use Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySkuList\SkuListResponse;

class QuerySkuListResponse extends Response
{
    public function getResponseDtoClassName(): string
    {
        return SkuListResponse::class;
    }
}
