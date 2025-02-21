<?php

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Request;
use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Post;

class QuerySpuListRequest extends Request
{
    use Post;


    public function getUrlPath(): string
    {
        return '/open/api/v1/distribute/product/querySpuList';
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
        return QuerySpuListResponse::class;
    }
}
