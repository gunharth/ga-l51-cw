<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    
	protected $fillable = [
    	'name',
        'medium_id',
    	'archive'
    ];


    public function formats() {
    	return $this->hasMany('App\Format');
    }

    public function medium() {
    	return $this->belongsTo('App\Medium');
    }

    /*public function onCreate() {
        App\Format::create();
        //return $this->belongsTo('App\Medium');
    }*/
}
