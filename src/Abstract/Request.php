<?php
/**
 * File: Abstract/Request.php
 */

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Abstract;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\RequestInterface;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\ParametersInterface;
use Psr\Http\Message\ResponseInterface;

abstract class Request implements RequestInterface
{
    private array $headers = [
        'Content-Type' => 'application/json',
    ];


    public function __construct(
        string                        $accessToken,
        protected ParametersInterface $parameters
    )
    {
        $this->headers['Access-Token'] = $accessToken;
    }


    public function getUrlPath(): string
    {
        return '';
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


    public function getResponseClassName(): string
    {
        return '';
    }


    public function getResponse(ResponseInterface $response): Response
    {
        $class = $this->getResponseClassName();
        return new $class($response);
    }
}
