<?php

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Abstract;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Muscobytes\Poizon\tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

class TestAbstractParametersClass extends Parameters {}

#[CoversClass(Parameters::class)]
class ParametersTest extends BaseTest
{
    public function testParameters()
    {
        $parameters = new TestAbstractParametersClass();
        $this->assertTrue(method_exists($parameters, 'toArray'));
    }
}
