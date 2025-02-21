<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Stubs\Traits\HttpsMethods;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\ParametersInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Get;

class GetStub
{
    use Get;

    public function __construct(
        private readonly ParametersInterface $parameters,
    )
    {
        //
    }

}
