<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Postfriday\Castable\Traits\ToArray;

class SpuListData implements DtoInterface
{
    use ToArray;
    use FromArray;

    /**
     * @param int $total Total items quantity
     * @param array<Spu> $spuList List of SPUs
     */
    public function __construct(
        public int $total,
        public array $spuList
    )
    {
        //
    }


    public static function fromArray(array $array): self
    {
        return new self(
            total: $array['total'],
            spuList: array_map(
                callback: fn ($item) => Spu::fromArray($item),
                array: $array['spuList']
            ),
        );
    }
}
