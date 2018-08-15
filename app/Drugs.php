<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drugs extends Model
{
  public function user(){
        return $this->belongsTo('App\User');
    }
  public function attributes()
  {
  return $this->hasMany('App\Attribute');
  }
  public function bills()
  {
  return $this->belongsTo('App\Bill');
  }
  public function quantities()
  {
  return $this->belongsTo('App\Quantity');
  }

}
