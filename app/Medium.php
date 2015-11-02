<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medium extends Model implements SluggableInterface
{
    use SluggableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
        'on_update'     => true,
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

    public function issues()
    {
        return $this->hasMany('App\Issue')->orderBy('erscheinungstermin', 'desc');
    }
}
