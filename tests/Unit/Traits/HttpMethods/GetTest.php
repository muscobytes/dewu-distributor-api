<?php

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Traits\HttpMethods;

use DateTime;
use DateTimeInterface;
use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\ParametersInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Get;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

class GetTestParameters extends Parameters
{
    public function __construct(
        public int $id,
        public string $name,
        public bool $isActive,
        public DateTimeInterface $createdAt
    )
    {
        //
    }
}

class GetTestClass
{
    use Get;

    public function __construct(
        private readonly ParametersInterface $parameters,
    )
    {
        //
    }
}

#[CoversClass(Get::class)]
class GetTest extends BaseTest
{
    public function testGetTrait(): void
    {
        $parameters = new GetTestParameters(
            id: 114,
            name: 'May the Force be with you',
            isActive: true,
            createdAt: new DateTime('1979-02-19 12:59:01')
        );
        $class = new GetTestClass($parameters);
        $this->assertTrue(method_exists($class, 'getHttpMethod'));
        $this->assertIsString($class->getHttpMethod());
        $this->assertEquals('GET', $class->getHttpMethod());

        $this->assertIsArray($class->getQueryParams());
        $this->assertEquals([
            'id' => 114,
            'name' => 'May the Force be with you',
            'isActive' => true,
            'createdAt' => '1979-02-19'
        ], $class->getQueryParams());
    }
}
