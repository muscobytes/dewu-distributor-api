<?php

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Request;
use Muscobytes\TakeadsApi\Traits\Methods\Post;

class QuerySpuListRequest extends Request
{
    use Post;

    protected string $path = '/distribute/product/querySpuList';

    protected string $responseClass = QuerySpuListResponse::class;
}
