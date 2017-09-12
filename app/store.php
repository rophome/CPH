<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    public function company()
    {
        return $this->belongsTo(company::class,'company_id');
    }
    public function tasks()
    {
        return $this->hasMany(tasks::class,'company_id');
    }
}
