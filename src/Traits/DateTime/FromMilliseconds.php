<?php

namespace Muscobytes\Poizon\DistributionApiClient\Traits\DateTime;

use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;

trait FromMilliseconds
{
    public static function fromMilliseconds(int $datetime): DateTimeInterface
    {
        return DateTimeImmutable::createFromFormat(
            format: 'U.v',
            datetime: intdiv($datetime, 1000) . '.' . substr((string)$datetime, -3),
            timezone: new DateTimeZone('UTC')
        );
    }
}
