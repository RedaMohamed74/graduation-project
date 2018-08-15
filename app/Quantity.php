<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
  public function pharamcies()
  {
  return $this->belongsTo('App\Pharamcy');
  }

  public function drugs()
  {
  return $this->belongsTo('App\Drugs');
  }

}
