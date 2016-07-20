<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'solved' ];

    public function user(){
        return $this->belongsTo('User');
    }

    public function answer(){
        return $this->hasMany('Answer');
    }

    
}
