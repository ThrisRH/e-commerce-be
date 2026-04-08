<?php

namespace App\Ship\Enums;

enum UserRole: string
{
    case Customer = 'n-customer';
    case Admin = 'super-admin';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
