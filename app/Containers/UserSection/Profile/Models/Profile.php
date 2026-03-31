<?php

namespace App\Containers\UserSection\Profile\Models;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Parents\Models\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
