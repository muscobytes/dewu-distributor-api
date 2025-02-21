<?php

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Abstract;

use Mockery;
use Muscobytes\Poizon\DistributionApiClient\Abstract\Response;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;
use Psr\Http\Message\StreamInterface;

#[CoversClass(Response::class)]
class ResponseTest extends BaseTest
{
    private HttpResponseInterface $httpResponseMock;


    protected function setUp(): void
    {
        $this->httpResponseMock = Mockery::mock(HttpResponseInterface::class);
    }


    public function test_get_response(): void
    {
        $response = new class($this->httpResponseMock) extends Response {
            public function getResponseDtoClassName(): string
            {
                return DtoInterface::class;
            }
        };

        $this->assertSame($this->httpResponseMock, $response->getResponse());
    }


    public function test_get_payload(): void
    {
        $expected = ['key' => 'value', 'description' => null];

        $mockStream = Mockery::mock(StreamInterface::class);
        $mockStream->shouldReceive('getContents')->andReturn(json_encode($expected));

        $this->httpResponseMock->shouldReceive('getBody')->andReturn($mockStream);

        $dtoMockClass = new class implements DtoInterface {
            public static function fromArray(array $array): DtoInterface
            {
                $instance = new self();
                $instance->data = $array;
                return $instance;
            }
            public function toArray(): array { return $this->data; }
            private array $data = [];
        };

        $responseWithMockedDto = new class($this->httpResponseMock, $dtoMockClass) extends Response {
            private string $dtoClass;
            public function __construct(HttpResponseInterface $response, object $dtoClass)
            {
                parent::__construct($response);
                $this->dtoClass = get_class($dtoClass);
            }
            public function getResponseDtoClassName(): string
            {
                return $this->dtoClass;
            }
        };

        $payload = $responseWithMockedDto->getPayload();
        $this->assertInstanceOf(DtoInterface::class, $payload);
        $this->assertSame($expected, $payload->toArray());
    }
}
