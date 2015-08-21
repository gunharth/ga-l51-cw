<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediumType extends Model
{
    protected $table = 'types';

    protected $fillable = [
    	'title'
    ];
}
