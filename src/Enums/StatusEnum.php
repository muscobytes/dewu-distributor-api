<?php

namespace Muscobytes\Poizon\DistributionApiClient\Enums;

enum StatusEnum: string
{
    case PUBLISHED = 'PRODUCT_ON';
    case REMOVED = 'PRODUCT_OFF';
}
