<?php

namespace Muscobytes\Poizon\DistributionApiClient\Interfaces;

interface ParametersInterface
{
    public function toArray(
        bool $transformBoolean,
        bool $removeNullValues
    ): array;
}
