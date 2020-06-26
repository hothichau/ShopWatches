<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
     public function category(){
            return $this->hasMany('App\Product','category_id','id');
        }
}