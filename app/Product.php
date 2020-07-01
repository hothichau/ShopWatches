<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{
    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }
    
    function getDisplayoldPrice()
    {
        $formatedPrice = number_format($this->old_price,0,'.','.'); // Định dạng giá
        return $formatedPrice . " vnđ";
    }

    function getDisplaynewPrice()
    {
        $formatedPrice = number_format($this->new_price,0,'.','.'); // Định dạng giá
        return $formatedPrice . " vnđ";
    }
}
