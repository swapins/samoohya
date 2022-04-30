<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedIn extends Model
{
    protected $fillable = [
        'user_id',
        'connected',
        'token',
        'refreshToken',
        'expiresIn',
        'linkedin_id',
        'nickname',
        'name',
        'email',
        'avatar'
    ];
}
