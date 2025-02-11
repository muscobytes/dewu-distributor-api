<?php

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Request;
use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Post;

class QuerySpuListRequest extends Request
{
    use Post;

    protected string $path = '/distribute/product/querySpuList';

    protected string $responseClassName = QuerySpuListResponse::class;
}
