<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList;

use DateTimeImmutable;
use DateTimeInterface;
use Muscobytes\Poizon\DistributionApiClient\Enums\SeasonEnum;
use Muscobytes\Poizon\DistributionApiClient\Enums\StatusEnum;
use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Muscobytes\Poizon\DistributionApiClient\Traits\DateTime\FromMilliseconds;
use Postfriday\Castable\Attributes\CastWith;
use Postfriday\Castable\Casters\DateTimeCaster;
use Postfriday\Castable\Traits\ToArray;

class Spu implements DtoInterface
{
    use ToArray;
    use FromArray;
    use FromMilliseconds;

    /**
     * @param int $id ID
     * @param DateTimeImmutable $createTime Creation time (UTC timestamp in milliseconds)
     * @param DateTimeImmutable $modifyTime Modification time (UTC timestamp in milliseconds)
     * @param int $dwSpuId SPU ID
     * @param string $distSpuId Distributor's SPU ID
     * @param StatusEnum $distStatus Status (PRODUCT_ON: Published, PRODUCT_OFF: Removed)
     * @param string $dwSpuTitle Item name in Chinese
     * @param string $distSpuTitle Item name in English
     * @param string $dwDesignerId Article Number/Style ID
     * @param string $distBrandName Brand name
     * @param string $distCategoryl1Name Primary category
     * @param string $distCategoryl2Name Secondary category
     * @param string $distCategoryl3Name Tertiary category
     * @param string $distFitPeopleName Target user
     * @param string $image Image of logo
     * @param array<string> $baseImage Basic image
     * @param int $authPrice Retail price
     * @param DateTimeInterface|null $sellDate Release date
     * @param array<SeasonEnum> $season Season
     * @param string $material Material
     * @param string $style Style
     * @param string $sizeChart Size chart
     * @param string $productDesc Item details
     * @param array<Sku>|null $skuList List of SKUs
     */
    public function __construct(

        public int $id,

        #[CastWith(DateTimeCaster::class, [DateTimeInterface::RFC3339])]
        public DateTimeInterface $createTime,

        #[CastWith(DateTimeCaster::class, [DateTimeInterface::RFC3339])]
        public DateTimeInterface $modifyTime,

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

        #[CastWith(DateTimeCaster::class, [DateTimeInterface::RFC3339])]
        public ?DateTimeInterface $sellDate,

        public array $season,

        public string $material,

        public string $style,

        public string $sizeChart,

        public string $productDesc,

        public ?array $skuList
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
            dwSpuId: $array['dwSpuId'],
            distSpuId: $array['distSpuId'],
            distStatus: StatusEnum::from($array['distStatus']),
            dwSpuTitle: $array['dwSpuTitle'],
            distSpuTitle: $array['distSpuTitle'],
            dwDesignerId: $array['dwDesignerId'],
            distBrandName: $array['distBrandName'],
            distCategoryl1Name: $array['distCategoryl1Name'],
            distCategoryl2Name: $array['distCategoryl2Name'],
            distCategoryl3Name: $array['distCategoryl3Name'],
            distFitPeopleName: $array['distFitPeopleName'],
            image: $array['image'],
            baseImage: $array['baseImage'],
            authPrice: $array['authPrice'],
            sellDate: key_exists('sellDate', $array) ? self::fromMilliseconds($array['sellDate']) : null,
            season: array_map(
                callback: fn ($item) => SeasonEnum::from($item),
                array: array_filter(
                    array: explode(',', $array['season']),
                    callback: fn ($item) => !empty($item)
                )
            ),
            material: $array['material'],
            style: $array['style'],
            sizeChart: $array['sizeChart'],
            productDesc: $array['productDesc'],
            skuList: array_map(
                callback: fn ($item) => Sku::fromArray($item),
                array: $array['skuList']
            )
        );
    }
}
