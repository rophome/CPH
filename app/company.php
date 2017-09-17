<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{

    protected $fillable = [
        'name','company_contact_user_id'
    ];


    public function company_user()
    {
        return $this->hasMany(company_user::class,'approved_by_user_id');
    }

    public function contact()
    {
        return $this->belongsTo(User::class,'company_contact_user_id');
//        return $this->belongsTo(User::class,'user_id');

    }

    public function users() {
        return $this->belongsToMany(user::class)->withTimestamps();
    }

}
