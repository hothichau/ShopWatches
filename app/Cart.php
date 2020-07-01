<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    function getDisplayPrice()
    {
        $formatedPrice = number_format($this->new_price,0,'.','.'); // Định dạng giá
        return $formatedPrice . " vnđ";
    }

    public function product(){
        return $this->hasMany('App\Product','id','pro_id');
    }

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }


}
