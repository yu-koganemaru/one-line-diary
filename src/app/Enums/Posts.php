<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Posts extends Enum
{
    const PAGINATE = 5;

    public static function getDescription($value): string
    {
        if ($value === self::PAGINATE) {
            return 'トップページネーション';
        }

        return parent::getDescription($value);
    }

    public static function getValue(string $key):mixed
    {
        if ($key === 'トップページネーション') {
            return self::PAGINATE;
        }

        return parent::getValue($key);
    }
}
