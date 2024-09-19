<?php

namespace App\Enums;

enum Role : int
{
    case admin = 1;
    case customer = 2;

    case supplier = 3;


    public static function tryFromName(string $name): ?self
    {
        return match (strtolower($name)) {
            'admin' => self::admin,
            'customer' => self::customer,
            'supplier' => self::supplier,
            default => null,
        };
    }

}
