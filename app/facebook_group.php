<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facebook_group extends Model
{
    protected $fillable = [
        'user_id',
        'token_id',
        'group_id',
        'group_token',
        'image',
        'name',
        'privacy',
        'provider',
    ];
}
