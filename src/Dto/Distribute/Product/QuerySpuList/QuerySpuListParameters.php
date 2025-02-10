<?php

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;

class QuerySpuListParameters extends Parameters
{
    public function __construct(
        public int $startId,
        public int $pageSize,
        public array $pwSpuId,
        public array $distPuId,
        public string $dwSpuTitle,
        public string $distPusTitle,
        public array $dwDesignerId,
        public array $distBrandName,
        public array $distCategory1Name,
        public array $distCategory2Name,
        public array $distCategory3Name,
        public array $distFitPeopleName,
        public string $season,
        public string $distStatus,
        public int $modifyStartTime,
        public int $modifyEndTime,
        public bool $querySku
    )
    {
        //
    }
}
