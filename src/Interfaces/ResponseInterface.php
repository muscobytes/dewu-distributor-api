<?php
/**
 * File: Interfaces/ResponseInterface.php
 */

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Interfaces;

use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

interface ResponseInterface
{
    public function getResponse(): HttpResponseInterface;

    public function getPayload(): DtoInterface;

    public function getResponseDtoClassName(): string;
}
