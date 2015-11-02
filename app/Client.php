<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'firma',
        'ansprache',
        'strasse',
        'ort',
        'plz',
        'tel',
        'vat_country',
        'vat_number',
        'agent'
    ];

    public function inserate()
    {
        return $this->hasMany('App\Inserat');
    }
}
