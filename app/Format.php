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
        $werbeabgabe = number_format(round($brutto*1.05,2),2);

        $brutto = number_format($werbeabgabe*1.2,2);
        return array('preis' => $this->preis, 'rabatt' => $rabatt, 'provision' => $provision, 'werbeabgabe' => $werbeabgabe, 'brutto' => $brutto);
    }

    public function issue() {
    	return $this->belongsTo('App\Issue');
    }

}
