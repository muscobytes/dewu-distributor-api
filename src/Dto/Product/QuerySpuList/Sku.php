<?php

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Enums\StatusEnum;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\ToArray;

class Sku implements DtoInterface
{
    use ToArray;
    use FromArray;

    /**
     * @param int $id
     * @param int $createTime
     * @param int $modifyTime
     * @param StatusEnum $distStatus
     * @param int $dwSkuId
     * @param string $distSkuId
     * @param string $image
     * @param string $barcode
     * @param int $minBidPrice
     * @param string $skuLink
     * @param array<SaleAttr> $saleAttr
     */
    public function __construct(
        public int $id,
        public int $createTime,
        public int $modifyTime,
        public StatusEnum $distStatus,
        public int $dwSkuId,
        public string $distSkuId,
        public string $image,
        public string $barcode,
        public int $minBidPrice,
        public string $skuLink,
        public array $saleAttr
    )
    {
        //
    }


    public static function fromArray(array $array): self
    {
        return new self(
            id: $array['id'],
            createTime: $array['createTime'],
            modifyTime: $array['modifyTime'],
            distStatus: $array['distStatus'],
            dwSkuId: $array['dwSkuId'],
            distSkuId: $array['distSkuId'],
            image: $array['image'],
            barcode: $array['barcode'],
            minBidPrice: $array['minBidPrice'],
            skuLink: $array['skuLink'],
            saleAttr: array_map(
                fn ($item) => SaleAttr::fromArray($item),
                $array['saleAttr']
            )
        );
    }
}
