<?php

namespace Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList\Enums\SeasonEnum;
use Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList\Enums\StatusEnum;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\ToArray;

class Spu implements DtoInterface
{
    use ToArray;
    use FromArray;

    /**
     * @param int $id
     * @param int $createTime
     * @param int $modifyTime
     * @param int $dwSpuId
     * @param string $distSpuId
     * @param StatusEnum $distStatus
     * @param string $dwSpuTitle
     * @param string $distSpuTitle
     * @param string $dwDesignerId
     * @param string $distBrandName
     * @param string $distCategoryl1Name
     * @param string $distCategoryl2Name
     * @param string $distCategoryl3Name
     * @param string $distFitPeopleName
     * @param string $image
     * @param array<string> $baseImage
     * @param int $authPrice
     * @param int $sellDate
     * @param array<SeasonEnum> $season
     * @param string $material
     * @param string $style
     * @param string $sizeChart
     * @param string $productDesc
     */
    public function __construct(
        public int $id,
        public int $createTime,
        public int $modifyTime,
        public int $dwSpuId,
        public string $distSpuId,
        public StatusEnum $distStatus,
        public string $dwSpuTitle,
        public string $distSpuTitle,
        public string $dwDesignerId,
        public string $distBrandName,
        public string $distCategoryl1Name,
        public string $distCategoryl2Name,
        public string $distCategoryl3Name,
        public string $distFitPeopleName,
        public string $image,
        public array $baseImage,
        public int $authPrice,
        public int $sellDate,
        public array $season,
        public string $material,
        public string $style,
        public string $sizeChart,
        public string $productDesc
    )
    {
        //
    }
}
