<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Abstract;

use Mockery;
use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Muscobytes\Poizon\DistributionApiClient\Abstract\Request;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Request::class)]
class RequestTest extends BaseTest
{
    private function getMockRequest(): Request
    {
        return $this->getMockBuilder(Request::class)
            ->setConstructorArgs([
                'test_access_token',
                $this->getMockBuilder(Parameters::class)->getMock()
            ])
            ->onlyMethods(['getHttpMethod'])
            ->getMock();
    }


    public function test_constructor_sets_access_token(): void
    {
        $request = $this->getMockRequest();
        $this->assertSame([
            'Content-Type' => 'application/json',
            'Access-Token' => 'test_access_token',
        ], $request->getHeaders());
    }


    public function test_get_url_path_returns_empty_string(): void
    {
        $request = $this->getMockRequest();
        $this->assertSame('', $request->getUrlPath());
    }


    public function test_get_query_params_returns_empty_array(): void
    {
        $request = $this->getMockRequest();
        $this->assertSame([], $request->getQueryParams());
    }


    public function test_set_header_adds_header(): void
    {
        $request = $this->getMockRequest();
        $request->setHeader('User-Agent', 'Gordon Freeman');

        $expectedHeaders = [
            'Content-Type' => 'application/json',
            'Access-Token' => 'test_access_token',
            'User-Agent' => 'Gordon Freeman',
        ];

        $this->assertSame($expectedHeaders, $request->getHeaders());
    }

    public function test_get_body_returns_empty_string(): void
    {
        $request = $this->getMockRequest();
        $this->assertSame('', $request->getBody());
    }


    public function test_set_body_adds_body(): void
    {
        $expected = json_encode([
            'startId' => 23
        ]);
        $requestMock = Mockery::mock(Request::class);
        $requestMock->shouldReceive('getBody')->andReturn($expected);
        $this->assertSame($expected, $requestMock->getBody());
    }
}
