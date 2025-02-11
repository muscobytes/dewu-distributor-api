<?php

namespace Muscobytes\Poizon\DistributionApiClient\Interfaces;

use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

interface ResponseInterface
{
    public function getResponse(): HttpResponseInterface;

    public function getPayload(): DtoInterface;

    public function getDtoClassName(): string;
}
