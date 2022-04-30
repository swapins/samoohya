<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileQuota extends Model
{
    protected $fillable =[
        'user_id',
        'used_qouta',
        'flag',
    ];
}
