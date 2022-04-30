<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdetails extends Model
{
    protected $fillable = [
        'user_id',
        'photo',
        'disc'
    ];
}
