<?php

namespace App\Containers\OrderSection\Order\Models;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Enums\OrderStatus;
use App\Ship\Enums\PaymentMethod;
use App\Ship\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'shipping_fee',
        'status',
        'shipping_name',
        'shipping_phone',
        'shipping_address',
        'payment_method',
        'payment_status',
        'transaction_id',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected function casts(): array
    {
        return [
            'total_amount' => 'decimal:2',
            'shipping_fee' => 'decimal:2',
            'status' => OrderStatus::class,
            'payment_method' => PaymentMethod::class,
            'payment_status' => PaymentStatus::class,
        ];
    }

    protected $attributes = [
        'status' => OrderStatus::Pending->value,
        'payment_status' => PaymentStatus::Pending->value,
        'payment_method' => PaymentMethod::COD->value,
    ];
}
