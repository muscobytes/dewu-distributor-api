<?php

namespace Unit\Traits\Array;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\ToArray;
use Muscobytes\Poizon\tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

class ToArrayTraitClassExample
{
    use ToArray;

    public function __construct(
        public int $id,
        public string $name,
        public bool $isActive,
        public array $tags,
        public DateTimeInterface $createdAt,
        public DateTimeInterface $updatedAt,
    )
    {
        //
    }
}

#[CoversClass(ToArray::class)]
class ToArrayTest extends BaseTest
{
    #[DataProvider('toArrayDataProvider')]
    public function testToArray(ToArrayTraitClassExample $object)
    {
        $this->assertTrue(method_exists($object, 'toArray'));

        $array = $object->toArray();
        $this->assertIsArray($array);

        $this->assertArrayHasKey('id', $array);
        $this->assertIsInt($array['id']);
        $this->assertEquals(42, $array['id']);

        $this->assertArrayHasKey('name', $array);
        $this->assertIsString($array['name']);
        $this->assertEquals('Example', $array['name']);

        $this->assertArrayHasKey('isActive', $array);
        $this->assertIsBool($array['isActive']);
        $this->assertFalse($array['isActive']);

        $this->assertArrayHasKey('tags', $array);
        $this->assertIsArray($array['tags']);
        $this->assertEquals(['tag1', 'tag2', 'tag3'], $array['tags']);

        $this->assertArrayHasKey('createdAt', $array);
        $this->assertIsString($array['createdAt']);
        $this->assertEquals('2019-03-08', $array['createdAt']);

        $this->assertArrayHasKey('updatedAt', $array);
        $this->assertIsString($array['updatedAt']);
        $this->assertEquals('2016-04-12', $array['updatedAt']);
    }


    public static function toArrayDataProvider(): array
    {
        return [
            [
                'object' => new ToArrayTraitClassExample(
                    id: 42,
                    name: 'Example',
                    isActive: false,
                    tags: [ 'tag1', 'tag2', 'tag3' ],
                    createdAt: new DateTimeImmutable('2019-03-08T08:00:42+00:00'),
                    updatedAt: new DateTime('2016-04-12T01:28:42+00:00'),
                )
            ]
        ];
    }
}
