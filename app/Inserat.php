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

    protected $appends = [  
        'prettyPreis',
        'prettyWert_Rabatt',
        'prettyPreis2',
        'prettyWert_provision',
        'prettyNetto',
        'prettyWert_werbeabgabe',
        'prettyPreis4',
        'prettyUst',
        'prettyBrutto'
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

    public function getPrettyPreisAttribute()
    {
        $preis = number_format((float)$this->attributes['preis'], 2, ',', '.');
        return $preis;
    }

    public function getPrettyWertRabattAttribute()
    {
        $value = number_format((float)$this->attributes['wert_rabatt'], 2, ',', '.');
        return $value;
    }

    public function getPrettyPreis2Attribute()
    {
        $value = number_format((float)$this->attributes['preis2'], 2, ',', '.');
        return $value;
    }

    public function getPrettyWertProvisionAttribute()
    {
        $value = number_format((float)$this->attributes['wert_provision'], 2, ',', '.');
        return $value;
    }

    public function getPrettyNettoAttribute()
    {
        $value = number_format((float)$this->attributes['netto'], 2, ',', '.');
        return $value;
    }

    public function getPrettyWertWerbeabgabeAttribute()
    {
        $value = number_format((float)$this->attributes['wert_werbeabgabe'], 2, ',', '.');
        return $value;
    }

    public function getPrettyPreis4Attribute()
    {
        $value = number_format((float)$this->attributes['preis4'], 2, ',', '.');
        return $value;
    }

    public function getPrettyUstAttribute()
    {
        $value = number_format((float)$this->attributes['ust'], 2, ',', '.');
        return $value;
    }

    public function getPrettyBruttoAttribute()
    {
        $value = number_format((float)$this->attributes['brutto'], 2, ',', '.');
        return $value;
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
