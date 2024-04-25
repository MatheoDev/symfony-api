<?php

namespace App\ContentNegociation;

abstract class AbstractFormater implements FormaterInterface
{
    public const string SUPPORTED_FORMAT = '';

    public function support(string $format): bool
    {
        return $format === static::SUPPORTED_FORMAT;
    }
}
