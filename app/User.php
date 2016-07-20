<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
   protected $fillable = ['username', 'password'];
   use Authenticatable;

   public function question(){
      return $this->hasMany('Question');
   }
   public function answer(){
      return $this->hasMany('Answer');
   }
}
