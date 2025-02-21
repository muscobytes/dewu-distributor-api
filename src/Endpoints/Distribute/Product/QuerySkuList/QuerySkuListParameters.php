<?php
/**
 * File: Endpoints/Distribute/Product/QuerySkuList.php
 */

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySkuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Muscobytes\Poizon\DistributionApiClient\Enums\StatusEnum;

class QuerySkuListParameters extends Parameters
{
    /**
     * @param int|null $startId Pagination start ID
     * @param int|null $pageSize Page size
     * @param array|null $dwSpuId SPU ID
     * @param array|null $dwSkuId SKU ID
     * @param array|null $distSpuId Distributor's SPU ID
     * @param array|null $distSkuId Distributor's SKU ID
     * @param StatusEnum|null $distStatus Status (PRODUCT_ON: Published, PRODUCT_OFF: Removed)
     * @param bool|null $hasPrice Existence of price
     * @param int|null $modifyStartTime Modification start time, UTC timestamp in milliseconds
     * @param int|null $modifyEndTime Modification end time, UTC timestamp in milliseconds
     */
    public function __construct(
        public ?int        $startId = null,
        public ?int        $pageSize = null,
        public ?array      $dwSpuId = null,
        public ?array      $dwSkuId = null,
        public ?array      $distSpuId = null,
        public ?array      $distSkuId = null,
        public ?StatusEnum $distStatus = null,
        public ?bool       $hasPrice = null,
        public ?int        $modifyStartTime = null,
        public ?int        $modifyEndTime = null,
    )
    {
        //
    }
}
