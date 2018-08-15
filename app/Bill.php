<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
  public function pharamcies()
  {
  return $this->belongsTo('App\Pharamcy');
  }

  public function drugs(){
      return $this->hasMany('App\Drugs');
  }

}
