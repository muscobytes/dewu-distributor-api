<?php

namespace Muscobytes\Poizon\DistributionApiClient\Interfaces;

interface DtoInterface
{
    public function toArray(): array;

    public static function fromArray(array $array): self;
}
