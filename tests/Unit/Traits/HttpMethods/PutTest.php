<?php

namespace Unit\Traits\HttpMethods;

use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Put;
use Muscobytes\Poizon\tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

class PutTestClass
{
    use Put;
}

#[CoversClass(Put::class)]
class PutTest extends BaseTest
{
    public function testPutTrait()
    {
        $class = new PutTestClass();
        $this->assertTrue(method_exists($class, 'getHttpMethod'));
        $this->assertIsString($class->getHttpMethod());
        $this->assertEquals('PUT', $class->getHttpMethod());
    }
}
