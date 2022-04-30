<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id',
        'page_id',
        'page_token',
        'name',
        'provider',
        'image',
        'fa_fa'
    ];
}
