<?php

namespace App\Utils;

use Illuminate\Support\Str;
class CommonUtil
{
    public static function generateUUID()
    {
        return (string) Str::orderedUuid();
    }
}
