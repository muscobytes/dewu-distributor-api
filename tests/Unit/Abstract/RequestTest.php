<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Abstract;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Muscobytes\Poizon\DistributionApiClient\Abstract\Request;
use Muscobytes\Poizon\DistributionApiClient\Exceptions\ResponseClassDoesNotExists;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;

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
        $this->assertSame(['Access-Token' => 'test_access_token'], $request->getHeaders());
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
        $request->setHeader('Content-Type', 'application/json');

        $expectedHeaders = [
            'Access-Token' => 'test_access_token',
            'Content-Type' => 'application/json'
        ];

        $this->assertSame($expectedHeaders, $request->getHeaders());
    }

    public function test_get_body_returns_empty_string(): void
    {
        $request = $this->getMockRequest();
        $this->assertSame('', $request->getBody());
    }

    /**
     * @throws Exception
     */
    public function test_get_response_throws_error_if_response_class_not_set(): void
    {
        $request = $this->getMockRequest();
        $this->expectException(ResponseClassDoesNotExists::class);
        $request->getResponse($this->createMock('Psr\Http\Message\ResponseInterface'));
    }
}
