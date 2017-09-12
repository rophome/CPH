<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    public function company_users()
    {
        return $this->hasMany(document_attachments::class,'document_id	');
    }

}
