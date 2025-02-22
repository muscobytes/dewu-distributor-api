<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySkuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Request;
use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Post;

class QuerySkuListRequest extends Request
{
    use Post;


    public function getUrlPath(): string
    {
        return '/open/api/v1/distribute/product/querySkuList';
    }


    public function getBody(): string
    {
        return json_encode($this->parameters->toArray(
            transformBoolean: false,
            removeNullValues: true
        ));
    }


    public function getResponseClassName(): string
    {
        return QuerySkuListResponse::class;
    }
}
