<?php

namespace Muscobytes\Poizon\DistributionApiClient\Traits\Casts;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\CastInterface;

class EnumCast implements CastInterface
{
    /** @param class-string<\UnitEnum> $enumClass */
    public function __construct(private readonly string $enumClass) {}

    public function cast(mixed $value): mixed
    {
        return $this->enumClass::tryFrom($value) ?? throw new \InvalidArgumentException("Invalid enum value: $value");
    }
}
