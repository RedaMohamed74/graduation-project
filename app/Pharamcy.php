<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharamcy extends Model
{

  public function quantity(){
      return $this->hasMany('App\Quantity');
  }

  public function bill(){
      return $this->hasMany('App\Bill');
  }
   public function pharmcy_favorite()
    {
      return $this->hasMany('App\pharmacy_favorite');
     }

}
