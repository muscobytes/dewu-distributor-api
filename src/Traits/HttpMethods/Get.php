<?php

namespace Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\ParametersInterface;

trait Get
{
    private ParametersInterface $parameters;

    public function getHttpMethod(): string
    {
        return 'GET';
    }

    public function getQueryParams(): array
    {
        return $this->parameters->toArray(transformBoolean: true);
    }
}
