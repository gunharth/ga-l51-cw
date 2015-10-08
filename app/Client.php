<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

     protected $fillable = [
    	'firma',
    	'strasse',
    	'ort',
    	'plz',
    	'tel'
    ];

    public function inserate() {
        return $this->hasMany('App\Inserat');
    }
}
