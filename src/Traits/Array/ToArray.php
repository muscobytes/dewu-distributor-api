<?php

namespace Muscobytes\Poizon\DistributionApiClient\Traits\Array;

trait ToArray
{
    protected function processObject(
        object $object,
        string $format
    )
    {
        if ($object instanceof \DateTimeInterface) {
            return $object->format($format);
        }

        if ($object instanceof \UnitEnum) {
            return $object->value;
        }

        return $object->toArray();
    }

    public function transformArray(
        array $array,
        bool $transformBoolean,
        string $format = 'Y-m-d'
    ): array
    {
        return array_map(
            fn (mixed $element) => match(gettype($element)) {
                'boolean' => $transformBoolean ? $element ? 'true' : 'false' : $element,
                'object' => $this->processObject($element, $format),
                'array' => $this->transformArray($element, $transformBoolean),
                default => $element
            },
            $array
        );
    }


    public function toArray(
        bool $transformBoolean = false,
        bool $removeNullValues = true
    ): array
    {
        return array_filter(
            $this->transformArray(get_object_vars($this), $transformBoolean),
            fn ($value) => !$removeNullValues || !is_null($value)
        );
    }
}
