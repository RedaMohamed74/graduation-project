<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pharmcy_favorite extends Model
{
  public function user(){
      return $this->hasMany('App\User');
  }

  public function pharmcy(){
      return $this->hasMany('App\Pharamcy');
  }
}
