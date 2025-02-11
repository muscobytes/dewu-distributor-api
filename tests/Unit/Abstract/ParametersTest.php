<?php

namespace Muscobytes\Poizon\tests\Unit\Abstract;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Muscobytes\Poizon\tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

class ConcreteClass extends Parameters {}

#[CoversClass(Parameters::class)]
class ParametersTest extends BaseTest
{
    public function testParameters()
    {
        $parameters = new ConcreteClass();
        $this->assertTrue(method_exists($parameters, 'toArray'));
    }
}
