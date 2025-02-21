<?php

namespace Muscobytes\Poizon\DistributionApiClient;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Muscobytes\Poizon\DistributionApiClient\Exceptions\ClientErrorException;
use Muscobytes\Poizon\DistributionApiClient\Exceptions\ServerErrorException;
use Muscobytes\Poizon\DistributionApiClient\Exceptions\ServiceUnavailableException;
use Muscobytes\Poizon\DistributionApiClient\Exceptions\UnknownErrorException;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\RequestInterface;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\ResponseInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\RequestInterface as HttpRequestInterface;


class Client
{
    protected HttpRequestInterface $request;

    public function __construct(
        protected readonly string          $base_uri = 'https://distopen.poizon.com',
        protected ?ClientInterface         $client = null,
        protected ?RequestFactoryInterface $requestFactory = null,
        protected ?StreamFactoryInterface  $streamFactory = null
    )
    {
        $this->client = $client ?: Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?: Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?: Psr17FactoryDiscovery::findStreamFactory();
    }


    public function createUri(RequestInterface $request): UriInterface
    {
        return $this->requestFactory
            ->createUri($this->base_uri)
            ->withPath($request->getUrlPath())
            ->withQuery(http_build_query($request->getQueryParams()));
    }


    /**
     * @throws ServiceUnavailableException
     * @throws ServerErrorException
     * @throws ClientErrorException
     * @throws UnknownErrorException
     */
    public function call(RequestInterface $request): ResponseInterface
    {
        $this->request = $this->requestFactory->createRequest(
            $request->getHttpMethod(),
            $this->createUri($request)
        );

        foreach ($request->getHeaders() as $key => $value) {
            $this->request = $this->request->withHeader($key, $value);
        }

        $this->request = $this->request->withBody(
            $this->streamFactory->createStream(
                $request->getBody()
            )
        );

        try {
            $response = $this->client->sendRequest(
                $this->request
            );
        } catch (ClientExceptionInterface $e) {
            throw new ClientErrorException($e->getMessage(), $e->getCode(), $e);
        }

        if (in_array($response->getStatusCode(), range(501, 511))) {
            throw new ServiceUnavailableException($response->getReasonPhrase(), $response->getStatusCode());
        } elseif ($response->getStatusCode() === 500) {
            throw new ServerErrorException($response->getReasonPhrase(), $response->getStatusCode());
        } elseif (in_array($response->getStatusCode(), range(400, 499))) {
            throw new ClientErrorException($response->getReasonPhrase(), $response->getStatusCode());
        } elseif (
            !in_array($response->getStatusCode(), [200, 201])
        ) {
            throw new UnknownErrorException($response->getReasonPhrase(), $response->getStatusCode());
        }

        return $request->getResponse($response);
    }
}
