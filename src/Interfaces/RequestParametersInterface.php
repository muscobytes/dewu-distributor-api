<?php

namespace Muscobytes\Poizon\DistributionApiClient\Interfaces;

interface RequestParametersInterface
{
    public function toArray(
        bool $transformBoolean,
        bool $removeNullValues
    ): array;
}
