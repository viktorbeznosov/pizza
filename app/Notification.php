<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Order;

class Notification extends Model
{
    protected $fillable = array('type','message','info');

    public function getInfo(){
        return json_decode($this->info);
    }

    public function getRoute(){
        switch ($this->type){
            case 'users':
                $user = User::find($this->getInfo()->user->id);
                if ($user){
                    return '/admin/users/' . $this->getInfo()->user->id . '/edit';
                } else {
                    return 'javascript:void(0)';
                }
                break;
            case 'orders':
                $order = Order::find($this->getInfo()->order->id);
                if ($order){
                    return '/admin/orders/'. $this->getInfo()->order->id .'/edit';
                } else {
                    return 'javascript:void(0)';
                }
                break;
        }
    }
    
    public function read(){
        $this->read = 1;
        $this->save();
    }
}
