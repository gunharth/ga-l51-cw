<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    //

    public function medium() {
    	return $this->belongsTo('App\Medium');
    }

}
