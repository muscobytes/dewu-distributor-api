<?php

namespace Muscobytes\Poizon\DistributionApiClient\Interfaces;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Response;
use Psr\Http\Message\ResponseInterface;

interface RequestInterface
{
    public function __construct(
        string $accessToken,
        RequestParametersInterface $parameters
    );

    public function getHttpMethod(): string;

    public function getUrlPath(): string;

    public function getQueryParams(): array;

    public function getHeaders(): array;

    public function getBody(): string;

    public function getResponse(ResponseInterface $response): Response;
}
