<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{

    protected $fillable = [
        'name'
    ];


    public function company_users()
    {
        return $this->hasMany(company_users::class,'approved_by_user_id');
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
