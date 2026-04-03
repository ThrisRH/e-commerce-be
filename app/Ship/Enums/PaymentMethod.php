<?php

namespace App\Ship\Enums;

enum PaymentMethod: string
{
    case COD = 'cod';
    case BANK_TRANSFER = 'bank_transfer';
}
