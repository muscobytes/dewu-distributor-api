<?php

namespace Muscobytes\Poizon\DistributionApiClient\Traits;

trait FromArray
{
    public static function fromArray(array $array): self
    {
        return new self(...$array);
    }
}
