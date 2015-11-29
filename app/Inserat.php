<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inserat extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'inserate';

    /*
    type = format oder sonderverrechnung
    art = format wodei entweder Auftrag, GG oder PR
    */

    protected $fillable = [
        'user_id',
        'client_id',
        'client_text',
        'issue_id',
        //'type',
        'art',
        'strecke',
        'preis',
        'wert_rabatt_proz',
        'wert_rabatt',
        'preis2',
        'wert_provision_proz',
        'wert_provision',
        'preis3',
        'netto',
        'wert_wa_proz',
        'wert_werbeabgabe',
        'preis4',
        'wert_ust_proz',
        'ust',
        'brutto',
        'sujet',
        'auftragsnummer',
        'notes'
    ];

    public function getArtAttribute($value) {
        switch($value) {
          case 0: 
            return 'IN';
          case 1:
            return 'GG';
          break;
          case 2:
            return 'PK';
          break;
        }
    }

    public function getPreisAttribute($value) {
        if($value == '0.00') {
            return '';
        } else {
            return $value;
        }
    }

    public function getRabattAttribute($value) {
        if($value == '0') {
            return '0.00';
        } else {
            return $value;
        }
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function format()
    {
        return $this->belongsToMany('App\Format', 'format_inserat')->withTimestamps()->withPivot('pr');
    }
}
