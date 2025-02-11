<?php

namespace Unit\Traits\HttpMethods;

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
    public function testPostTrait()
    {
        $class = new PostTestClass();
        $this->assertTrue(method_exists($class, 'getHttpMethod'));
        $this->assertIsString($class->getHttpMethod());
        $this->assertEquals('POST', $class->getHttpMethod());
    }
}
