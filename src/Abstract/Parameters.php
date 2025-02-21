<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Abstract;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\ParametersInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\ToArray;

abstract class Parameters implements ParametersInterface
{
    use ToArray;
}
