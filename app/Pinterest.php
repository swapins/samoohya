<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinterest extends Model
{
    protected $fillable = [
    'token',
    'user_id',
    'connected',
    "Pinterest_id",
    "profile_image"

    ];
}
