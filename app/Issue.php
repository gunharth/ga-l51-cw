<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Issue extends Model
{
    
	protected $dates = [
        'redaktionsschluss',
        'drucktermin',
        'erscheinungstermin'
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
    	'archive'
    ];

    /*public function scopePublisched($query) {
        $query->where('erscheinungstermin')

    }*/

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


    public function formats() {
    	return $this->hasMany('App\Format');
    }

    public function medium() {
    	return $this->belongsTo('App\Medium');
    }

    /*public function onCreate() {
        App\Format::create();
        //return $this->belongsTo('App\Medium');
    }*/
}
