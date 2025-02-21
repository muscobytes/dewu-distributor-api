<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Abstract\Dto;
use Muscobytes\Poizon\DistributionApiClient\Attributes\CastWith;
use Muscobytes\Poizon\DistributionApiClient\Enums\StatusEnum;
use Muscobytes\Poizon\DistributionApiClient\Traits\Casts\ArrayOfCast;
use Muscobytes\Poizon\DistributionApiClient\Traits\Casts\EnumCast;

class Sku extends Dto
{
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

        #[CastWith(EnumCast::class, StatusEnum::class)]
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
            distStatus: StatusEnum::from($array['distStatus']),
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
