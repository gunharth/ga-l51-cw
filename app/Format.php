<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $fillable = [
    	'name',
    	'preis',
    	'issue_id'
    ];

    public function getPreisAttribute($value) {
    	if($value == '0.00') {
    		return '';
    	} else {
    		return $value;
    	}
    }

    public function issue() {
    	return $this->belongsTo('App\Issue');
    }

}
