<?php

namespace Muscobytes\Poizon\DistributionApiClient\Exceptions;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\CastInterface;

class InvalidCasterClassException extends \Exception
{
    public function __construct(string $className)
    {
        $expected = CastInterface::class;

        parent::__construct(
            "Class `{$className}` doesn't implement {$expected} and can't be used as a caster"
        );
    }
}
