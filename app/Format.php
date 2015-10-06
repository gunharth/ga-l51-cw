<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $fillable = [
    	'name',
    	'preis',
        'flaeche',
    	'issue_id',
        'type',
        'art'
    ];

    public function getPreisAttribute($value) {
    	if($value == '0.00') {
    		return '';
    	} else {
    		return $value;
    	}
    }

    public function calculateCosts() {
        
        if ($this->nettoinput > 0) {
            $netto = $this->nettoinput;
            $wa = $netto;
           /* if($this->type == 0) {
                $wa = round($wa/1.05,2);
            }*/
            //$ust = round($werbeabgabe*0.2,2);
            //$brutto = round($werbeabgabe*1.2,2);

            $wert_rabatt = 0;
            $wert_provision = 0;
            $wert_werbeabgabe = 0;
            //$brutto = $this->bruttoinput;
            //$netto = round($brutto/120*100,2);
            //$ust = round($netto*0.2,2);
            $preis = $netto;

            if($this->type == 0) {
                $wert_werbeabgabe = $netto-round($netto/105*100,2);
                $wa = round($netto*1.05,2);
                //$preis = $netto-$wert_werbeabgabe;
            }
            $ust = round($wa*0.2,2);
            $brutto = round($wa*1.2,2);
            $provision = $netto;
            $rabatt = $provision;
            if($this->provision > 0) {
                $rabatt = round($provision/(100-$this->provision)*100,2);
                $wert_provision = round(($rabatt/100)*$this->provision,2);
            }
            $preis = $rabatt;
            if($this->rabatt > 0) {
                $preis = round($rabatt/(100-$this->rabatt)*100,2);
                $wert_rabatt = round(($preis/100)*$this->rabatt,2);
            }
            return array(
                'preis' => number_format((float)$preis,2,'.',''), 
                'rabatt' => number_format((float)$rabatt,2,'.',''), 
                'wert_rabatt' => number_format((float)$wert_rabatt,2,'.',''), 
                'provision' => number_format((float)$provision,2,'.',''),
                'wert_provision' => number_format((float)$wert_provision,2,'.',''), 
                'wert_werbeabgabe' => number_format((float)$wert_werbeabgabe,2,'.',''),
                'wa' => number_format((float)$wa,2,'.',''),
                'netto' => number_format((float)$netto,2,'.',''), 
                'ust' => number_format((float)$ust,2,'.',''), 
                'brutto' => number_format((float)$brutto,2,'.','')
            );
        } else if ($this->bruttoinput > 0) {
            $wert_rabatt = 0;
            $wert_provision = 0;
            $wert_werbeabgabe = 0;
            $brutto = $this->bruttoinput;
            $netto = round($brutto/120*100,2);
            $ust = round($netto*0.2,2);
            $preis = $netto;
            $wa = $netto;

            if($this->type == 0) {
                $wert_werbeabgabe = $netto-round($netto/105*100,2);
                $wa = $netto;

                $preis = $netto-$wert_werbeabgabe;
                $netto = $preis;
            }
            $provision = $preis;
            $rabatt = $provision;
            if($this->provision > 0) {
                $rabatt = round($provision/(100-$this->provision)*100,2);
                $wert_provision = round(($rabatt/100)*$this->provision,2);
            }
            $preis = $rabatt;
            if($this->rabatt > 0) {
                $preis = round($rabatt/(100-$this->rabatt)*100,2);
                $wert_rabatt = round(($preis/100)*$this->rabatt,2);
            }
            return array(
                'preis' => number_format((float)$preis,2,'.',''), 
                'rabatt' => number_format((float)$rabatt,2,'.',''), 
                'wert_rabatt' => number_format((float)$wert_rabatt,2,'.',''), 
                'provision' => number_format((float)$provision,2,'.',''),
                'wert_provision' => number_format((float)$wert_provision,2,'.',''), 
                'wert_werbeabgabe' => number_format((float)$wert_werbeabgabe,2,'.',''),
                'wa' => number_format((float)$wa,2,'.',''), 
                'netto' => number_format((float)$netto,2,'.',''), 
                'ust' => number_format((float)$ust,2,'.',''), 
                'brutto' => number_format((float)$brutto,2,'.','')
            );
        } else {
            $brutto = $this->preis;
            $rabatt = $this->preis;
            $wert_rabatt = 0;
            $provision = $this->preis;
            $wert_provision = 0;
            $wert_werbeabgabe = 0;
            if($this->rabatt > 0) {
                $wert_rabatt = round(($this->preis/100)*$this->rabatt,2);
                $rabatt = $rabatt - $wert_rabatt;
                $provision = $rabatt;
                $brutto = $rabatt;
            }
            if($this->provision > 0) {
                $wert_provision = round(($rabatt/100)*$this->provision,2);
                $provision = $rabatt - $wert_provision;
                $brutto = $provision;
            }
            $netto = $brutto;
            $wa = $netto;
            if($this->type == 0 && $this->art != 2) {
                $wert_werbeabgabe = round($brutto*0.05,2);
                $wa = $brutto+$wert_werbeabgabe;
            } 
            /*else {
                $netto = $brutto;
            }*/
            $ust = round($wa*0.2,2);
            $brutto = round($wa*1.2,2);
            return array(
                'preis' => number_format((float)$this->preis,2,'.',''), 
                'rabatt' => number_format((float)$rabatt,2,'.',''), 
                'wert_rabatt' => number_format((float)$wert_rabatt,2,'.',''), 
                'provision' => number_format((float)$provision,2,'.',''),
                'wert_provision' => number_format((float)$wert_provision,2,'.',''), 
                'wert_werbeabgabe' => number_format((float)$wert_werbeabgabe,2,'.',''),
                'wa' => number_format((float)$wa,2,'.',''), 
                'netto' => number_format((float)$netto,2,'.',''), 
                'ust' => number_format((float)$ust,2,'.',''), 
                'brutto' => number_format((float)$brutto,2,'.','')
            );
        }
    }

    public function issue() {
    	return $this->belongsTo('App\Issue');
    }

    public function inserate() {
        return $this->hasMany('App\Inserat');
    }

    /*public function scopeManual($query) {
        return $query->where('type', 0);
    }*/

}
