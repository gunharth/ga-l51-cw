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

    public function calculateCosts() {
        $brutto = $this->preis;
        $rabatt = $this->preis;
        $provision = $this->preis;
        if($this->rabatt > 0) {
            $rabatt = $rabatt - round(($this->preis/100)*$this->rabatt,2);
            $provision = $rabatt;
            $brutto = $rabatt;
        }
        if($this->provision > 0) {
            $provision = $rabatt - round(($rabatt/100)*$this->provision,2);
            $brutto = $provision;
        }
        $werbeabgabe = round($brutto*1.05,2);
        //$werbeabgabe = number_format($werbeabgabe,2);
        $ust = round($werbeabgabe*0.2,2);

        $brutto = round($werbeabgabe*1.2);
        return array(
            'preis' => number_format($this->preis,2,'.',''), 
            'rabatt' => number_format($rabatt,2,'.',''), 
            'provision' => number_format($provision,2,'.',''), 
            'werbeabgabe' => number_format($werbeabgabe,2,'.',''), 
            'ust' => number_format($ust,2,'.',''), 
            'brutto' => number_format($brutto,2,'.','')
        );
    }

    public function issue() {
    	return $this->belongsTo('App\Issue');
    }

    public function inserate() {
        return $this->hasMany('App\Inserat');
    }

}
