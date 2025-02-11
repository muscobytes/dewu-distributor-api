<?php

namespace Muscobytes\Poizon\DistributionApiClient\Abstract;

use Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList\QuerySpuListResponse;
use Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList\SpuListResponse;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\ResponseInterface;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

abstract class Response implements ResponseInterface
{
    public function __construct(
        protected HttpResponseInterface $response
    )
    {
        //
    }


    public function getResponse(): HttpResponseInterface
    {
        return $this->response;
    }


    protected function getDtoClass(ResponseInterface $response): string
    {
        return match (get_class($this)) {
            QuerySpuListResponse::class => SpuListResponse::class
        };
    }


    public function getPayload(): array
    {
        /** @var DtoInterface $dtoClassName */
        $dtoClassName = $this->getDtoClass($this);
        return array_map(
            fn (array $item) => $dtoClassName::fromArray($item),
            json_decode($this->getResponse()->getBody(), true)['data']
        );
    }
}
