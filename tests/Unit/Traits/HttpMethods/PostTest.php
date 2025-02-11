<?php

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Traits\HttpMethods;

use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Post;
use Muscobytes\Poizon\tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

class PostTestClass
{
    use Post;
}

#[CoversClass(Post::class)]
class PostTest extends BaseTest
{
    public function testPostTrait(): void
    {
        $class = new PostTestClass();
        $this->assertTrue(method_exists($class, 'getHttpMethod'));
        $this->assertIsString($class->getHttpMethod());
        $this->assertEquals('POST', $class->getHttpMethod());
    }
}
