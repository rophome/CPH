<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class document_attachments extends Model
{
    public function document()
    {
        return $this->belongsTo(document::class,'document_id');
    }

}
