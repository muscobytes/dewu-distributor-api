<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Traits\HttpMethods;

use DateTime;
use Muscobytes\Poizon\DistributionApiClient\Tests\Stubs\Abstract\ParametersStub;
use Muscobytes\Poizon\DistributionApiClient\Tests\Stubs\Traits\HttpsMethods\GetStub;
use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Get;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;


#[CoversClass(Get::class)]
class GetTest extends BaseTest
{
    protected GetStub $stub;


    public function setUp(): void
    {
        $this->stub = new GetStub(
            new ParametersStub(
                id: 42,
                isActive: true,
                isDisabled: false,
                name: 'May the force be with you',
                createdAt: new DateTime('2019-03-08 08:30:42'),
                data: []
            )
        );
        parent::setUp();
    }

    public function test_get_trait(): void
    {
        $this->assertTrue(method_exists($this->stub, 'getHttpMethod'));
        $this->assertIsString($this->stub->getHttpMethod());
        $this->assertEquals('GET', $this->stub->getHttpMethod());

        $this->assertIsArray($this->stub->getQueryParams());
        $this->assertEquals([
            'id' => 42,
            'isActive' => 'true',
            'isDisabled' => 'false',
            'name' => 'May the force be with you',
            'createdAt' => '08/03/2019 08:30:42',
            'data' => []
        ], $this->stub->getQueryParams());
    }
}
