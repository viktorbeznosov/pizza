<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Notification;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.admin', function($view) {
            $view->with(array(
                'notifications' => Notification::where('read',0)->get(),
                'users' =>   User::all(),
                'admins' => Admin::where('id',"!=", Auth::guard('admin')->user()->id)->get()
            ));          
        });
        
        dump(Admin::getAllRooms());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
