<?php

namespace Muscobytes\Poizon\DistributionApiClient\Abstract;

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


    public function getPayload(): DtoInterface
    {
        /** @var DtoInterface $dtoClassName */
        $dtoClassName = $this->getDtoClassName();
        return $dtoClassName::fromArray(
            json_decode($this->getResponse()->getBody(), true)
        );
    }
}
