<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    
	use SoftDeletes;

    protected $dates = [
        'redaktionsschluss',
        'drucktermin',
        'erscheinungstermin',
        'deleted_at'
    ];

    protected $fillable = [
    	'name',
        'medium_id',
        'redaktionsschluss',
        'drucktermin',
        'erscheinungstermin',
        'druckerei',
        'vertrieb',
        'druckauflage',
        'seiten',
        'sollumsatz',
        'basisanbot',
        'redaktion',
        'fotokosten',
        'grafik',
        'lektorat',
        'mehrseiten',
        'druck',
        'vertriebkosten',
        'sonderkosten',
    	'archive'
    ];

    /*public function scopePublisched($query) {
        $query->where('erscheinungstermin')

    }*/
    public function getBasisanbotAttribute($value) {
        if($value == '0.00') {
            return '';
        } else {
            return $value;
        }
    }
    public function getRedaktionAttribute($value) {
        if($value == '0.00') {
            return '';
        } else {
            return $value;
        }
    }
    public function getFotokostenAttribute($value) {
        if($value == '0.00') {
            return '';
        } else {
            return $value;
        }
    }
    public function getGrafikAttribute($value) {
        if($value == '0.00') {
            return '';
        } else {
            return $value;
        }
    }
    public function getLektoratAttribute($value) {
        if($value == '0.00') {
            return '';
        } else {
            return $value;
        }
    }
    public function getMehrseitenAttribute($value) {
        if($value == '0.00') {
            return '';
        } else {
            return $value;
        }
    }
    public function getDruckAttribute($value) {
        if($value == '0.00') {
            return '';
        } else {
            return $value;
        }
    }
    public function getVertriebkostenAttribute($value) {
        if($value == '0.00') {
            return '';
        } else {
            return $value;
        }
    }
    public function getSonderkostenAttribute($value) {
        if($value == '0.00') {
            return '';
        } else {
            return $value;
        }
    }

    public function setRedaktionsschlussAttribute($date) {
        if($date != '') {
            $this->attributes['redaktionsschluss'] = Carbon::parse($date)->format('Y-m-d');
        } else {
            $this->attributes['redaktionsschluss'] = '0000-00-00';
        }
        
    }

    public function getRedaktionsschlussAttribute($date) {
        if($date != '0000-00-00') {
            return Carbon::parse($date)->format('d.m.Y');
        } else {
            return '';
        }
    }

    public function setDruckterminAttribute($date) {
        if($date != '') {
            $this->attributes['drucktermin'] = Carbon::parse($date)->format('Y-m-d');
        } else {
            $this->attributes['drucktermin'] = '0000-00-00';
        }
    }

    public function getDruckterminAttribute($date) {
        if($date != '0000-00-00') {
            return Carbon::parse($date)->format('d.m.Y');
        } else {
            return '';
        }
    }

    public function setErscheinungsterminAttribute($date) {
         if($date != '') {
            $this->attributes['erscheinungstermin'] = Carbon::parse($date)->format('Y-m-d');
        } else {
            $this->attributes['erscheinungstermin'] = '0000-00-00';
        }
    }

    public function getErscheinungsterminAttribute($date) {
        if($date != '0000-00-00') {
            return Carbon::parse($date)->format('d.m.Y');
        } else {
            return '';
        }
    }

    public function getIssueProductionCosts() {
        return  '€ ' . number_format($this->basisanbot+
                $this->redaktion+
                $this->fotokosten+
                $this->grafik+
                $this->lektorat+
                $this->mehrseiten+
                $this->druck+
                $this->vertriebkosten+
                $this->sonderkosten,2,",",".");
    }

    public function getSelectBoxAttribute()
    {
        $medium = $this->medium->title;
        return "$medium / $this->name";
    }


    public function formats() {
    	return $this->hasMany('App\Format')->orderBy('type')->orderBy('art');
    }
    public function formatsIssue() {
        return $this->hasMany('App\Format')->where('type',0)->where('art',0);
    }

    /*public function scopeManual($query) {
        return $query->where('type', 0);
    }*/


    public function medium() {
    	return $this->belongsTo('App\Medium');
    }

    /*public function onCreate() {
        App\Format::create();
        //return $this->belongsTo('App\Medium');
    }*/
}
