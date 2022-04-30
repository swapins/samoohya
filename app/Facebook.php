<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    protected $fillable = [
        'user_id',
        'fb_token'
    ];
}
