<?php

namespace App\Enums;

trait EnumHelper
{
    public static function values(): array
    {
        return array_column(static::cases(), 'value');
    }
}
