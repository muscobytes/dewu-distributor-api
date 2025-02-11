<?php

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Abstract;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Muscobytes\Poizon\DistributionApiClient\Abstract\Request;
use Muscobytes\Poizon\DistributionApiClient\Exceptions\ResponseClassDoesNotExists;
use Muscobytes\Poizon\tests\BaseTest;
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


    public function testConstructorSetsAccessToken(): void
    {
        $request = $this->getMockRequest();
        $this->assertSame(['Access-Token' => 'test_access_token'], $request->getHeaders());
    }


    public function testGetUrlPathReturnsEmptyString(): void
    {
        $request = $this->getMockRequest();
        $this->assertSame('', $request->getUrlPath());
    }


    public function testGetQueryParamsReturnsEmptyArray(): void
    {
        $request = $this->getMockRequest();
        $this->assertSame([], $request->getQueryParams());
    }


    public function testSetHeaderAddsHeader(): void
    {
        $request = $this->getMockRequest();
        $request->setHeader('Content-Type', 'application/json');

        $expectedHeaders = [
            'Access-Token' => 'test_access_token',
            'Content-Type' => 'application/json'
        ];

        $this->assertSame($expectedHeaders, $request->getHeaders());
    }

    public function testGetBodyReturnsEmptyString(): void
    {
        $request = $this->getMockRequest();
        $this->assertSame('', $request->getBody());
    }

    /**
     * @throws Exception
     */
    public function testGetResponseThrowsErrorIfResponseClassNotSet(): void
    {
        $request = $this->getMockRequest();
        $this->expectException(ResponseClassDoesNotExists::class);
        $request->getResponse($this->createMock('Psr\Http\Message\ResponseInterface'));
    }
}
