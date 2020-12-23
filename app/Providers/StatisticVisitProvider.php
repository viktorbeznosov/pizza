<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cookie;

class StatisticVisitProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        $userhash = Cookie::get('userhash'); // Узнаём, что за пользователь
//        if (!$userhash) {
//            /* Если это новый пользователь, то добавляем ему cookie, уникальные для него */
//            $userhash = uniqid();
////            Cookie::make('userhash', $userhash, 60);
//            
//        }
//        setcookie("userhash", 'foooooo', 3600);
//        dump($_COOKIE);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
