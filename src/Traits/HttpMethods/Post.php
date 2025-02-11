<?php

namespace Muscobytes\TakeadsApi\Traits\HttpMethods;

trait Post
{
    public function getHttpMethod(): string
    {
        return 'POST';
    }
}
