<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList;

use DateTimeInterface;
use Muscobytes\Poizon\DistributionApiClient\Enums\StatusEnum;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Muscobytes\Poizon\DistributionApiClient\Traits\DateTime\FromMilliseconds;
use Postfriday\Castable\Attributes\CastWith;
use Postfriday\Castable\Casters\DateTimeCaster;
use Postfriday\Castable\Traits\ToArray;

class Sku implements DtoInterface
{
    use FromArray;
    use ToArray;
    use FromMilliseconds;

    /**
     * @param int $id ID
     * @param DateTimeInterface $createTime Creation time (UTC timestamp in milliseconds)
     * @param DateTimeInterface $modifyTime Modification time (UTC timestamp in milliseconds)
     * @param StatusEnum $distStatus Status (PRODUCT_ON: Published, PRODUCT_OFF: Removed)
     * @param int $dwSkuId SKU ID
     * @param string $distSkuId Distributor's SKU ID
     * @param string $image Image of logo
     * @param string $barcode Barcode
     * @param int $minBidPrice Price
     * @param string $skuLink Item URL
     * @param array<SaleAttr> $saleAttr Sales specifications
     */
    public function __construct(
        public int $id,

        #[CastWith(DateTimeCaster::class, [DateTimeInterface::RFC3339])]
        public DateTimeInterface $createTime,

        #[CastWith(DateTimeCaster::class, [DateTimeInterface::RFC3339])]
        public DateTimeInterface $modifyTime,

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
            createTime: self::fromMilliseconds($array['createTime']),
            modifyTime: self::fromMilliseconds($array['modifyTime']),
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
