<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySkuList;

use Muscobytes\Poizon\DistributionApiClient\Interfaces\DtoInterface;
use Muscobytes\Poizon\DistributionApiClient\Traits\Array\FromArray;
use Postfriday\Castable\Traits\ToArray;

class SkuListResponse implements DtoInterface
{
    use FromArray;
    use ToArray;

    /**
     * @param int $code Result code
     * @param string $msg Result description
     * @param int $status Result status
     * @param SkuListData|null $data List of SKU's
     * @param string|null $domain Service
     */
    public function __construct(
        public int $code,
        public string $msg,
        public int $status,
        public ?SkuListData $data = null,
        public ?string $domain = null,
    )
    {
        //
    }


    public static function fromArray(array $array): self
    {
        return new self(
            code: $array['code'],
            msg: $array['msg'],
            status: $array['status'],
            data: SkuListData::fromArray($array['data']),
            domain: $array['domain']
        );
    }
}
