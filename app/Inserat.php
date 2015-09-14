<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inserat extends Model
{
    protected $table = 'inserate';

    protected $fillable = [
    	'user_id',
    	'issue_id',
    	'format_id',
    	'preis',
    	'rabatt',
    	'preis2',
    	'provision',
    	'preis3',
    	'werbeabgabe',
    	'preis4',
    	'brutto'
    ];


    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function format() {
        return $this->belongsTo('App\Format');
    }

    
}
