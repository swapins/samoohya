<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookID extends Model
{
    protected $fillable = [
    'user_id',
    'fid',
    'name',
    'fb_token'
    ];
}
