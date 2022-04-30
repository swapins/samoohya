<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post',
        'post_id',
        'user_id',
        'account_id',
        'response',
        'schedule',
        'file',
        'shorten',
        'media_url',
        'media_type',
        'provider',
        'fa_icon',
        'status',
        'post_id_str',
        'page_token'
    ];
}
