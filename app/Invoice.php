<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function inserat()
    {
        return $this->belongsTo('App\Inserat');
    }
}
