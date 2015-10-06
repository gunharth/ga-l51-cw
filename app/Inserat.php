<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inserat extends Model
{
    protected $table = 'inserate';

    /*
    type = format oder sonderverrechnung
    art = format wodei entweder Auftrag, GG oder PR
    */

    protected $fillable = [
    	'user_id',
        'client_id',
        'agent_id',
    	'issue_id',
    	'format_id',
        'type',
        'art',
        'strecke',
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

    public function client() {
        return $this->belongsTo('App\Client','client_id');
    }

    public function agent() {
        return $this->belongsTo('App\Client','agent_id');
    }

    public function format() {
        return $this->belongsTo('App\Format');
    }

    
}
