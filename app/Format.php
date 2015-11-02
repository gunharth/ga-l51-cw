<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Format extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'preis',
        'flaeche',
        'issue_id',
        'type',
        'art'
    ];

    /**
     * @param  number
     * @return number
     */
    public function getPreisAttribute($value)
    {
        if ($value == '0.00') {
            return '';
        } else {
            return $value;
        }
        //
    }

    /**
     * @return number
     */
    public function calculateCosts()
    {
        if ($this->nettoinput > 0) {
            $netto = $this->nettoinput;
            $wa = $netto;

            $wert_rabatt = 0;
            $wert_provision = 0;
            $wert_provision_proz = 0;
            $wert_werbeabgabe = 0;
            $wert_wa_proz = 0;
            $wert_ust_proz = 20;
            //$brutto = $this->bruttoinput;
            //$netto = round($brutto/120*100,2);
            //$ust = round($netto*0.2,2);
            //$preis = $netto;

            if ($this->type == 0) {
                $wert_werbeabgabe = round($netto/100*5, 2);
                $wa = round($netto*1.05, 2);
                $wert_wa_proz = 5;
                //$preis = $netto-$wert_werbeabgabe;
            }

            if ($this->add_vat == 0) {
                $ust = 0;
                $wert_ust_proz = 0;
                $brutto = $wa;
            } else {
                $ust = round($wa*0.2, 2);
                $brutto = round($wa*1.2, 2);
            }
            //$ust = round($wa*0.2, 2);
            //$brutto = round($wa*1.2, 2);
            $provision = $netto;
            $rabatt = $provision;
            if ($this->provision > 0) {
                //$rabatt = round($provision/(100-$this->provision)*100,2);

                if ($this->provision < 100) {
                    $provision = ($netto/(100-$this->provision))*100;
                    $wert_provision = round($provision-$netto, 2);
                    $wert_provision_proz = $this->provision;
                } else {
                    //$provision = 0.00;
                    $wert_provision = round($netto, 2);
                }
                $rabatt = $provision;
            }
            //$preis = $rabatt;
            if ($this->rabatt > 0) {
                //$preis = round($rabatt/(100-$this->rabatt)*100,2);
                $wert_rabatt = round(($rabatt/100)*$this->rabatt, 2);
            }
            $wert_rabatt_proz = 100-(($rabatt/$this->preis)*100);
            $wert_rabatt = round(($this->preis/100)*$wert_rabatt_proz, 2);

            return array(
                'preis' => number_format((float)$this->preis, 2, '.', ''),
                'rabatt' => number_format((float)$rabatt, 2, '.', ''),
                'wert_rabatt' => number_format((float)$wert_rabatt, 2, '.', ''),
                'wert_rabatt_proz' => number_format((float)$wert_rabatt_proz, 2, '.', ''),
                'provision' => number_format((float)$provision, 2, '.', ''),
                'wert_provision' => number_format((float)$wert_provision, 2, '.', ''),
                'wert_provision_proz' => $wert_provision_proz,
                'wert_werbeabgabe' => number_format((float)$wert_werbeabgabe, 2, '.', ''),
                'wert_wa_proz' => $wert_wa_proz,
                'wa' => number_format((float)$wa, 2, '.', ''),
                'netto' => number_format((float)$netto, 2, '.', ''),
                'ust' => number_format((float)$ust, 2, '.', ''),
                'wert_ust_proz' => $wert_ust_proz,
                'brutto' => number_format((float)$brutto, 2, '.', '')
            );
        /*} elseif ($this->bruttoinput > 0) {
            $wert_rabatt = 0;
            $wert_provision = 0;
            $wert_werbeabgabe = 0;
            $brutto = $this->bruttoinput;
            $netto = round($brutto/120*100, 2);
            $ust = round($netto*0.2, 2);
            $preis = $netto;
            $wa = $netto;

            if ($this->type == 0) {
                $wert_werbeabgabe = $netto-round($netto/105*100, 2);
                $wa = $netto;

                $preis = $netto-$wert_werbeabgabe;
                $netto = $preis;
            }
            $provision = $preis;
            $rabatt = $provision;
            if ($this->provision > 0) {
                $rabatt = round($provision/(100-$this->provision)*100, 2);
                $wert_provision = round(($rabatt/100)*$this->provision, 2);
            }
            $preis = $rabatt;
            if ($this->rabatt > 0) {
                $preis = round($rabatt/(100-$this->rabatt)*100, 2);
                $wert_rabatt = round(($preis/100)*$this->rabatt, 2);
            }
            return array(
                'preis' => number_format((float)$this->preis, 2, '.', ''),
                'rabatt' => number_format((float)$rabatt, 2, '.', ''),
                'wert_rabatt' => number_format((float)$wert_rabatt, 2, '.', ''),
                'wert_rabatt_proz' => $this->rabatt,
                'provision' => number_format((float)$provision, 2, '.', ''),
                'wert_provision' => number_format((float)$wert_provision, 2, '.', ''),
                'wert_werbeabgabe' => number_format((float)$wert_werbeabgabe, 2, '.', ''),
                'wa' => number_format((float)$wa, 2, '.', ''),
                'netto' => number_format((float)$netto, 2, '.', ''),
                'ust' => number_format((float)$ust, 2, '.', ''),
                'brutto' => number_format((float)$brutto, 2, '.', '')
            );*/
        } elseif ($this->preisinput > 0) {
            $rabatt = $this->preisinput;
            $provision = $rabatt;
            $brutto = $rabatt;
            $wert_rabatt = $this->preis-$this->preisinput;
            $wert_rabatt_proz = round(100-(($this->preisinput/$this->preis)*100), 2);
            $wert_provision = 0;
            $wert_provision_proz = 0;
            $wert_werbeabgabe = 0;
            $wert_wa_proz = 0;
            $wert_ust_proz = 20;

            /*if ($this->rabatt > 0) {
                $wert_rabatt = round(($this->preis/100)*$this->rabatt, 2);
                $wert_rabatt_proz = $this->rabatt;
                $rabatt = $rabatt - $wert_rabatt;
                $provision = $rabatt;
                $brutto = $rabatt;
            }*/
            if ($this->provision > 0) {
                $wert_provision = round(($rabatt/100)*$this->provision, 2);
                $wert_provision_proz = $this->provision;
                $provision = $rabatt - $wert_provision;
                $brutto = $provision;
            }
            $netto = $brutto;
            $wa = $netto;
            if ($this->type == 0 && $this->art != 2) {
                $wert_werbeabgabe = round($brutto*0.05, 2);
                $wa = $brutto+$wert_werbeabgabe;
                $wert_wa_proz = 5;
            }
            if ($this->add_vat == 0) {
                $ust = 0;
                $wert_ust_proz = 0;
                $brutto = $wa;
            } else {
                $ust = round($wa*0.2, 2);
                $brutto = round($wa*1.2, 2);
            }
            
            
            return array(
                'preis' => number_format((float)$this->preis, 2, '.', ''),
                'rabatt' => number_format((float)$rabatt, 2, '.', ''),
                'wert_rabatt' => number_format((float)$wert_rabatt, 2, '.', ''),
                'wert_rabatt_proz' => $wert_rabatt_proz,
                'provision' => number_format((float)$provision, 2, '.', ''),
                'wert_provision' => number_format((float)$wert_provision, 2, '.', ''),
                'wert_provision_proz' => $wert_provision_proz,
                'wert_werbeabgabe' => number_format((float)$wert_werbeabgabe, 2, '.', ''),
                'wert_wa_proz' => $wert_wa_proz,
                'wa' => number_format((float)$wa, 2, '.', ''),
                'netto' => number_format((float)$netto, 2, '.', ''),
                'ust' => number_format((float)$ust, 2, '.', ''),
                'wert_ust_proz' => $wert_ust_proz,
                'brutto' => number_format((float)$brutto, 2, '.', '')
            );
        } else {
            $brutto = $this->preis;
            $rabatt = $this->preis;
            $wert_rabatt = 0;
            $wert_rabatt_proz = 0;
            $provision = $this->preis;
            $wert_provision = 0;
            $wert_provision_proz = 0;
            $wert_werbeabgabe = 0;
            $wert_wa_proz = 0;
            $wert_ust_proz = 20;

            if ($this->rabatt > 0) {
                $wert_rabatt = round(($this->preis/100)*$this->rabatt, 2);
                $wert_rabatt_proz = $this->rabatt;
                $rabatt = $rabatt - $wert_rabatt;
                $provision = $rabatt;
                $brutto = $rabatt;
            }
            if ($this->provision > 0) {
                $wert_provision = round(($rabatt/100)*$this->provision, 2);
                $wert_provision_proz = $this->provision;
                $provision = $rabatt - $wert_provision;
                $brutto = $provision;
            }
            $netto = $brutto;
            $wa = $netto;
            if ($this->type == 0 && $this->art != 2) {
                $wert_werbeabgabe = round($brutto*0.05, 2);
                $wa = $brutto+$wert_werbeabgabe;
                $wert_wa_proz = 5;
            }
            if ($this->add_vat == 0) {
                $ust = 0;
                $wert_ust_proz = 0;
                $brutto = $wa;
            } else {
                $ust = round($wa*0.2, 2);
                $brutto = round($wa*1.2, 2);
            }
            
            
            return array(
                'preis' => number_format((float)$this->preis, 2, '.', ''),
                'rabatt' => number_format((float)$rabatt, 2, '.', ''),
                'wert_rabatt' => number_format((float)$wert_rabatt, 2, '.', ''),
                'wert_rabatt_proz' => $wert_rabatt_proz,
                'provision' => number_format((float)$provision, 2, '.', ''),
                'wert_provision' => number_format((float)$wert_provision, 2, '.', ''),
                'wert_provision_proz' => $wert_provision_proz,
                'wert_werbeabgabe' => number_format((float)$wert_werbeabgabe, 2, '.', ''),
                'wert_wa_proz' => $wert_wa_proz,
                'wa' => number_format((float)$wa, 2, '.', ''),
                'netto' => number_format((float)$netto, 2, '.', ''),
                'ust' => number_format((float)$ust, 2, '.', ''),
                'wert_ust_proz' => $wert_ust_proz,
                'brutto' => number_format((float)$brutto, 2, '.', '')
            );
        }
    }

    /**
     * @return [type]
     */
    public function issue()
    {
        return $this->belongsTo('App\Issue');
    }

    public function inserate()
    {
        return $this->belongsToMany('App\Inserat')->withPivot('pr');
    }

    /*public function scopeManual($query) {
        return $query->where('type', 0);
    }*/
}
