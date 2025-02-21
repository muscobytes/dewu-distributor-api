<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Traits\Array;

use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

class Concrete
{
    public function __construct(
        public int $id,
        public string $name,
        public int $age,
    )
    {
        //
    }

    use FromArray;
}

#[CoversClass(FromArray::class)]
class FromArrayTest extends BaseTest
{
    public function testFromArray(): void
    {
        $class = Concrete::fromArray([
            'id' => 17,
            'age' => 23,
            'name' => 'John Doe'
        ]);
        $this->assertInstanceOf(Concrete::class, $class);
        $this->assertTrue(method_exists($class, 'fromArray'));
        $this->assertIsInt(17, $class->id);
        $this->assertIsInt(23, $class->age);
        $this->assertIsString('John Doe', $class->name);
    }
}
