<?php

namespace App\Ship\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Shipping = 'shipping';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';

    public function colorBadge(): string
    {
        return match ($this) {
            OrderStatus::Pending => 'yellow',
            OrderStatus::Confirmed => 'blue',
            OrderStatus::Shipping => 'indigo',
            OrderStatus::Delivered => 'green',
            OrderStatus::Cancelled => 'red',
        };
    }

    public function transitions(): array
    {
        return match ($this) {
            OrderStatus::Pending => [self::Confirmed, self::Cancelled],
            OrderStatus::Confirmed => [self::Shipping,  self::Cancelled],
            OrderStatus::Shipping => [self::Delivered],
            OrderStatus::Delivered => [],
            OrderStatus::Cancelled => [],
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
