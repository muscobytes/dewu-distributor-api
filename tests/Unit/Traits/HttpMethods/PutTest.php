<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Traits\HttpMethods;

use Muscobytes\Poizon\DistributionApiClient\Tests\Stubs\Traits\HttpsMethods\PutStub;
use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Put;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Put::class)]
class PutTest extends BaseTest
{
    public function testPutTrait(): void
    {
        $class = new PutStub();
        $this->assertEquals('PUT', $class->getHttpMethod());
    }
}
