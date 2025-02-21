<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Traits\HttpMethods;

use Muscobytes\Poizon\DistributionApiClient\Tests\Stubs\Traits\HttpsMethods\PostStub;
use Muscobytes\Poizon\DistributionApiClient\Traits\HttpMethods\Post;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Post::class)]
class PostTest extends BaseTest
{
    public function testPostTrait(): void
    {
        $class = new PostStub();
        $this->assertEquals('POST', $class->getHttpMethod());
    }
}
