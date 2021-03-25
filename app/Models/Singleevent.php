<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Singleevent extends Model
{
    function getCategory(){
        return  $this->hasOne('App\Models\Event','id','category_id');
       }
}
