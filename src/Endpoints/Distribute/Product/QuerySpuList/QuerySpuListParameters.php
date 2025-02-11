<?php

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Muscobytes\Poizon\DistributionApiClient\Enums\SeasonEnum;
use Muscobytes\Poizon\DistributionApiClient\Enums\StatusEnum;

class QuerySpuListParameters extends Parameters
{
    /**
     * @param int|null $startId Pagination start ID
     * @param int|null $pageSize Page size
     * @param array<int>|null $dwSpuId SPU ID
     * @param array<int>|null $distSpuId Distributor's SPU ID
     * @param string|null $dwSpuTitle Item name in Chinese
     * @param string|null $distSpuTitle Item name in English
     * @param array<string>|null $dwDesignerId Article number/Style ID
     * @param array<string>|null $distBrandName Brand name
     * @param array<string>|null $distCategory1Name Primary category
     * @param array<string>|null $distCategory2Name Secondary category
     * @param array<string>|null $distCategory3Name Tertiary category
     * @param array<string>|null $distFitPeopleName Target user
     * @param SeasonEnum|null $season Season
     * @param StatusEnum|null $distStatus Status (PRODUCT_ON: Published, PRODUCT_OFF: Removed)
     * @param int|null $modifyStartTime Modification start time, UTC timestamp in milliseconds
     * @param int|null $modifyEndTime Modification end time, UTC timestamp in milliseconds
     * @param bool $querySku Return SKU info (Y or N)
     */
    public function __construct(
        public ?int    $startId = null,
        public ?int    $pageSize = null,
        public ?array  $dwSpuId = null,
        public ?array  $distSpuId = null,
        public ?string $dwSpuTitle = null,
        public ?string $distSpuTitle = null,
        public ?array  $dwDesignerId = null,
        public ?array  $distBrandName = null,
        public ?array  $distCategory1Name = null,
        public ?array  $distCategory2Name = null,
        public ?array  $distCategory3Name = null,
        public ?array  $distFitPeopleName = null,
        public ?SeasonEnum $season = null,
        public ?StatusEnum $distStatus = null,
        public ?int    $modifyStartTime = null,
        public ?int    $modifyEndTime = null,
        public ?bool   $querySku = null
    )
    {
        //
    }
}
