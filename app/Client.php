<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

     protected $fillable = [
    	'name'
    ];

    public function inserate() {
        return $this->hasMany('App\Inserat');
    }
}
