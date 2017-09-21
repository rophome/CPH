<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    protected $fillable = [
        'name',
        'company_id',
        'address_line1',
        'address_line2',
        'zip',
        'city',
        'country',
        'telephone',
        'email',
        'contact_person_id'
    ];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
    public function tasks()
    {
        return $this->hasMany(task::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'contact_person_id');
    }
}
