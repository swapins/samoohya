<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    
    protected $fillable = ['user_id',
    'name',
    'flag',
    "oauth_token",
    "oauth_token_secret",
    "u_id",
    "screen_name",
    'connected',
    'avatar'];
}
