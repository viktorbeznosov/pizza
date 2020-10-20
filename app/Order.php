<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = array(
        'user_id'
    );

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function status(){
        return $this->hasOne('App\OrderStatus', 'id', 'status_id');
    }

    public function products(){
        return $this->belongsToMany('App\Product','order_good', 'order_id','good_id')->withPivot(['id','quantity']);
    }

    public function getTotalPrice(){
        $total = 0;
        foreach ($this->products()->get() as $product){
            $total += floatval($product->price * $product->pivot->quantity);
        }
        return $total;
    }
}
