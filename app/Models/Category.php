<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function articleCount(){
     return $this->hasMany('App\Models\Article','category_id','id')->count();
    }



    //Baglanacagimiz Model //Baglanacagimiz sutun // Baglanilacaq id
}
