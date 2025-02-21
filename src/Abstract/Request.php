<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Abstract;

use Muscobytes\Poizon\DistributionApiClient\Exceptions\ResponseClassDoesNotExists;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\RequestInterface;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\ParametersInterface;
use Psr\Http\Message\ResponseInterface;

abstract class Request implements RequestInterface
{
    private array $headers = [];

    private string $path = '';

    private string $responseClassName = '';


    public function __construct(
        string                        $accessToken,
        protected ParametersInterface $parameters
    )
    {
        $this->headers['Access-Token'] = $accessToken;
    }


    public function getUrlPath(): string
    {
        return $this->path;
    }


    public function getQueryParams(): array
    {
        return [];
    }


    public function setHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;
        return $this;
    }


    public function getHeaders(): array
    {
        return $this->headers;
    }


    public function getBody(): string
    {
        return '';
    }


    /**
     * @throws ResponseClassDoesNotExists
     */
    public function getResponse(ResponseInterface $response): Response
    {
        if (!class_exists($this->responseClassName)) {
            throw new ResponseClassDoesNotExists("Response class ({$this->responseClassName}) does not exist", 1000);
        }
        return new $this->responseClassName($response);
    }
}
