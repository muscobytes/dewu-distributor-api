<?php

namespace Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\ParametersInterface;

trait Get
{
    public function getHttpMethod(): string
    {
        return 'GET';
    }

    public function getQueryParams(): array
    {
        return $this->parameters->toArray(transformBoolean: true);
    }
}
