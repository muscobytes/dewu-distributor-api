<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Stubs\Abstract;

use DateTimeInterface;
use Muscobytes\Poizon\DistributionApiClient\Abstract\Parameters;
use Postfriday\Castable\Attributes\CastWith;
use Postfriday\Castable\Casters\DateTimeCaster;

class ParametersStub extends Parameters
{
    public function __construct(
        public int $id,

        public bool $isActive,

        public bool $isDisabled,

        public ?string $name,

        #[CastWith(DateTimeCaster::class, ['d/m/Y H:i:s'])]
        public DateTimeInterface $createdAt,

        public array $data
    )
    {
        //
    }
}
