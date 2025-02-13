<?php

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Traits\HttpMethods;

use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Put;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

class PutTestClass
{
    use Put;
}

#[CoversClass(Put::class)]
class PutTest extends BaseTest
{
    public function testPutTrait(): void
    {
        $class = new PutTestClass();
        $this->assertTrue(method_exists($class, 'getHttpMethod'));
        $this->assertIsString($class->getHttpMethod());
        $this->assertEquals('PUT', $class->getHttpMethod());
    }
}
