<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    
	protected $fillable = [
    	'name',
    	'archive'
    ];


    public function medium() {
    	return $this->belongsTo('App\Medium');
    }
}
