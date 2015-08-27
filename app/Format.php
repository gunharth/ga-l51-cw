<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $fillable = [
    	'name',
    	'issue_id'
    ];

    public function issue() {
    	return $this->belongsTo('App\Issue');
    }

}
