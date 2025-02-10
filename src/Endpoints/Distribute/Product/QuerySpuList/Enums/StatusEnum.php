<?php

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList\Enums;

enum StatusEnum: string
{
    case PUBLISHED = 'PRODUCT_ON';
    case REMOVED = 'PRODUCT_OFF';
}
