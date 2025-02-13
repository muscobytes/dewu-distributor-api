<?php

namespace Muscobytes\Poizon\DistributionApiClient\Attributes;

use Attribute;
use Muscobytes\Poizon\DistributionApiClient\Exceptions\InvalidCasterClassException;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\CastInterface;

#[Attribute(Attribute::TARGET_ALL)]
class CastWith
{
    public array $args;

    /**
     * @throws InvalidCasterClassException
     */
    public function __construct(
        public string $casterClass,
        mixed ...$args
    ) {
        if (! is_subclass_of($this->casterClass, CastInterface::class)) {
            throw new InvalidCasterClassException($this->casterClass);
        }

        $this->args = $args;
    }
}
