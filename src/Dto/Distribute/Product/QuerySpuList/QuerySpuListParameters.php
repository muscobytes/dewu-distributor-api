<?php

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;

class QuerySpuListParameters extends Parameters
{
    /**
     * @param int $startId Pagination start ID
     * @param int $pageSize Page size
     * @param array $pwSpuId SPU ID
     * @param array $distPuId Distributor's SPU ID
     * @param string $dwSpuTitle Item name in Chinese
     * @param string $distPusTitle Item name in English
     * @param array $dwDesignerId Article number/Style ID
     * @param array $distBrandName Brand name
     * @param array $distCategory1Name Primary category
     * @param array $distCategory2Name Secondary category
     * @param array $distCategory3Name Tertiary category
     * @param array $distFitPeopleName Target user
     * @param string $season Season
     * @param string $distStatus Status (PRODUCT_ON: Published, PRODUCT_OFF: Removed)
     * @param int $modifyStartTime Modification start time, UTC timestamp in milliseconds
     * @param int $modifyEndTime Modification end time, UTC timestamp in milliseconds
     * @param bool $querySku Return SKU info (Y or N)
     */
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
