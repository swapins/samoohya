<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
    'name',
    'service_id',
    'price',
    'accounts_no',
    'no_of_users',
    'no_of_clients',
    'White_Label',
    'Feeds',
    'Analytics',
    'Inbox',
    'Content_Calendar',
    'Bulk_Scheduling',
    'Curated_Content',
    'Facebook_Ads',
    'Concierge_Setup',
    ];

    public function service_in_package()
    {
        return $this->hasMany(service_in_package::class,'package_id');
    }
}
