<?php

namespace Muscobytes\Poizon\DistributionApiClient\Abstract;


use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\ToArray;

abstract class Dto implements DtoInterface
{
    use ToArray;
}
