<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    function articleCount(){
        return $this->hasMany('App\Models\Singleevent','category_id','id')->count();
       }
}
