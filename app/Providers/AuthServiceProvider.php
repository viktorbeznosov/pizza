<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Admin;
use App\Permission;
use App\Blog;

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
            if (in_array($permission->name, array('UPDATE_ADMINS','DELETE_ADMINS'))) {
                //Админ не может удалить и редактировать самого себя
                Gate::define($permission->name, function (Admin $admin, Admin $user) use ($permission) {
                    return $admin->hasPermissions($permission->name) && $admin->id != $user->id;
                });
            } else if (in_array($permission->name, array('VIEW_BLOGS','UPDATE_BLOGS','DELETE_BLOGS'))) {
                Gate::define($permission->name, function (Admin $admin, Blog $blog = NULL) use ($permission) {
                    if ($admin->hasRoles('Blogger') && $blog != NULL){
                        return $admin->hasPermissions($permission->name) && $admin->id == $blog->admin_id;
                    } else {
                        return $admin->hasPermissions($permission->name);
                    }
                });
            } else {
                Gate::define($permission->name, function (Admin $admin) use ($permission){
                    return $admin->hasPermissions($permission->name);
                });
            }
        }

    }
}
