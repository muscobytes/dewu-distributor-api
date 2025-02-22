<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySkuList;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Postfriday\Castable\Traits\ToArray;

class SkuListData implements DtoInterface
{
    use FromArray;
    use ToArray;


    /**
     * @param int $total
     * @param array<Sku> $skuList
     */
    public function __construct(
        public int $total,
        public array $skuList
    )
    {
        //
    }


    public static function fromArray(array $array): self
    {
        return new self(
            total: $array['total'],
            skuList: array_map(
                callback: fn ($item) => Sku::fromArray($item),
                array: $array['skuList']
            )
        );
    }
}
