<?php
/**
 * File: Abstract/Response.php
 */

declare(strict_types=1);

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
        return call_user_func([
            $this->getResponseDtoClassName(),
            'fromArray'
        ], json_decode($this->getResponse()->getBody()->getContents(), true));
    }
}
