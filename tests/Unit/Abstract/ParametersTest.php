<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Abstract;

use DateTime;
use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use Muscobytes\Poizon\DistributionApiClient\Tests\Stubs\Abstract\ParametersStub;
use PHPUnit\Framework\Attributes\CoversClass;


#[CoversClass(Parameters::class)]
class ParametersTest extends BaseTest
{
    public function test_to_array_transforms_booleans(): void
    {
        $params = new ParametersStub(
            id: 7,
            isActive: true,
            isDisabled: false,
            name: 'name',
            createdAt: new DateTime('2016-04-12 01:00:00'),
            data: []
        );

        $result = $params->toArray(
            transformBoolean: true
        );

        $this->assertSame([
            'id' => 7,
            'isActive' => 'true',
            'isDisabled' => 'false',
            'name' => 'name',
            'createdAt' => '12/04/2016 01:00:00',
            'data' => [],
        ], $result);
    }
}
