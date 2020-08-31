<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Admin;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions = Permission::all();
        foreach ($permissions as $permission){
            if ($permission->name == 'DELETE_ADMINS'){
                //Админ не может удалить самого себя
                Gate::define($permission->name, function (Admin $admin, Admin $user) use ($permission){
                    return $admin->hasPermissions($permission->name) && $admin->id != $user->id;
                });                
            } else {
                Gate::define($permission->name, function (Admin $admin) use ($permission){
                    return $admin->hasPermissions($permission->name);
                });                
            }
        }

    }
}
