<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    public function approved_by_user()
    {
        return $this->belongsTo(User::class,'approved_by_user_id	');
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class,'created_by_user_id');
    }

    public function updated_by_user()
    {
        return $this->belongsTo(User::class,'updated_by_user_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class); // implicit document_ud based on naming
    }


}
