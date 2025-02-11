<?php

namespace Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods;

trait Post
{
    public function getHttpMethod(): string
    {
        return 'POST';
    }
}
