<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;	

class Medium extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
        'on_update'	 => true,
    ];

    protected $table = 'medium';

    protected $fillable = [
    	'title',
    	'cover',
        'type_id'
    ];

    /*public function formats() {
        return $this->hasMany('App\Format');
    }*/

    public function issues() {
        return $this->hasMany('App\Issue')->orderBy('erscheinungstermin','desc');
    }
    

}
