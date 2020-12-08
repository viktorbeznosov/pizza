<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;

class NotificationsController extends Controller
{
    public function create(Request $request){
        $input = $request->all();

        $notification = new Notification();
        $notification->fill($input);
        if ($notification->save()){
            print_r(json_encode(
                array(
                    'id' => $notification->id,
                    'type' => $notification->type,
                    'message' => $notification->message,
                    'info' => $notification->info,
                    'read' => $notification->read
                ), JSON_UNESCAPED_UNICODE
            ));
            die();
        }
    }

    public function read(Request $request){
        $input = $request->all();

        $notification = Notification::find($input['id']);
        $notification->read();
        
        print_r(json_encode(array(
            'success' => 1
        ), JSON_UNESCAPED_UNICODE));
    }
}
