<?php

namespace Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods;

trait Put
{
    public function getHttpMethod(): string
    {
        return 'PUT';
    }
}
