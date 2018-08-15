<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function Drugs(){
        return $this->hasMany('App\Drugs');
    }

}
