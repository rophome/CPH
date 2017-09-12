<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    public function store()
    {
        return $this->belongsTo(store::class,'store_id');
    }

    public function document()
    {
        return $this->hasmany(document::class,'document_id');
    }

    public function created()
    {
        return $this->belongsTo(user::class,'created_by_user_id');
    }

}
