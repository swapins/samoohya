<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_in_package extends Model
{
    protected $fillable =[
        'package_id',
        'service_name'
    ];

    public function service_to_package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

    
}
