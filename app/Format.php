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
        if($this->type == 0) {
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
        } else {
            return array(
                'preis' => '0,00', 
                'rabatt' => '0,00', 
                'provision' => '0,00', 
                'werbeabgabe' => '0,00', 
                'ust' => '0,00', 
                'brutto' => '0,00'
            );
        }
    }

    public function issue() {
    	return $this->belongsTo('App\Issue');
    }

    public function inserate() {
        return $this->hasMany('App\Inserat');
    }

}
