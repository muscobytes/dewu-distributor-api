<?php

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Abstract;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\ParametersInterface;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;


#[CoversClass(Parameters::class)]
class ParametersTest extends BaseTest
{
    private function getMockParameters(array $properties = []): ParametersInterface
    {
        $mock = $this->getMockBuilder(Parameters::class)
            ->onlyMethods([])
            ->getMock();

        foreach ($properties as $key => $value) {
            $mock->{$key} = $value;
        }
        return $mock;
    }


    public function testToArrayTransformsBooleans(): void
    {
        $params = $this->getMockParameters(['active' => true, 'disabled' => false]);
        $result = $params->toArray(
            transformBoolean: true
        );

        $this->assertSame(['active' => 'true', 'disabled' => 'false'], $result);
    }


    public function testToArrayPreservesBooleansIfNotTransformed(): void
    {
        $params = $this->getMockParameters(['active' => true, 'disabled' => false]);
        $result = $params->toArray(false);

        $this->assertSame(['active' => true, 'disabled' => false], $result);
    }


    public function testToArrayRemovesNullValuesByDefault(): void
    {
        $params = $this->getMockParameters(['name' => 'Test', 'value' => null]);
        $result = $params->toArray();

        $this->assertSame(['name' => 'Test'], $result);
    }


    public function testToArrayKeepsNullValuesIfRequested(): void
    {
        $params = $this->getMockParameters(['name' => 'Test', 'value' => null]);
        $result = $params->toArray(false, false);

        $this->assertSame(['name' => 'Test', 'value' => null], $result);
    }


    public function testToArrayTransformsDateTimeObjects(): void
    {
        $date = new \DateTime('2024-02-10');
        $params = $this->getMockParameters(['createdAt' => $date]);

        $result = $params->toArray();

        $this->assertSame(['createdAt' => '2024-02-10'], $result);
    }


    public function testToArrayHandlesNestedArrays(): void
    {
        $params = $this->getMockParameters(['data' => ['is_valid' => true, 'count' => 5]]);
        $result = $params->toArray(true);

        $this->assertSame(['data' => ['is_valid' => 'true', 'count' => 5]], $result);
    }
}
