<?php

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Request;
use Muscobytes\TakeadsApi\Traits\HttpMethods\Post;

class QuerySpuListRequest extends Request
{
    use Post;

    protected string $path = '/distribute/product/querySpuList';

    protected string $responseClass = QuerySpuListResponse::class;
}
