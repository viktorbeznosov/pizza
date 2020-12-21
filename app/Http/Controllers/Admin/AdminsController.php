<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GateHelper;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!GateHelper::all('VIEW_ADMINS')){
            return redirect()->route('admin.404');
        }
        $admins = Admin::all();
        $data = array(
            'title' => 'Админы',
            'admins' => $admins
        );
        return view('admin.admins', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!GateHelper::all('CREATE_ADMINS')){
            return redirect()->route('admin.404');
        }
        $roles = Role::all();
        $data = array(
            'title' => 'Добавление пользователя',
            'roles' => $roles
        );

        return view('admin.admin', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!GateHelper::all('CREATE_ADMINS')){
            return redirect()->route('admin.404');
        }
        $input = $request->except('_token');
        $input['password'] = bcrypt($input['name']);

        $messages = array(
            'required' => 'Поле :attribute обязательно к заполнению',
            'unique' => 'Поле :attribute должно быть уникальным'
        );
        $validator = Validator::make($input, array(
            'name' => 'required|max:255|unique:admins',
            'email' => 'required|max:255|unique:admins'
        ),$messages);
        if($validator->fails()){
            return redirect()->route('admin.admins.create')->withErrors($validator)->withInput();
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $input['image'] = 'assets/images/admins/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/assets/images/admins/', $input['image']);
        }
        $admin = new Admin();
        $admin->fill($input);
        if (isset($input['roles'])){
            foreach ($input['roles'] as $role_id){
                $admin->roles()->attach($role_id);
            } 
        }     
        if ($admin->save()){
            return redirect()->route('admin.admins.index')->with('status','Пользователь добавлен');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    public function profile($id){
        $admin = Admin::find($id);
        $data = array(
            'admin' => $admin
        );
        
        return view('admin.profile', $data);
    }
    
    public function profile_update(Request $request, $id){
        $input = $request->except('_token');
//        $input['password'] = bcrypt($input['password']);
//        $input['confirm_password'] = bcrypt($input['confirm_password']);
        
        dd($input);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);

        if (!GateHelper::all('UPDATE_ADMINS', array('user' => $admin))){
            return redirect()->route('admin.404');
        }

        $roles = Role::all();
        $adminRolesIds = array();
        foreach ($admin->roles()->get() as $role){
            $adminRolesIds[] = $role->id;
        }

//        dump(Gate::forUser(Auth::guard('admin')->user())->allows('VIEW_ADMINS', $admin));
//        dump($admin->hasPermissions('CREATE_SERVICES'));
//        dump(GateHelper::all('DELETE_ADMINS','UPDATE_ADMINS', array('user' => $admin)));
//        return view('admin.404', array('title' => ''))->withErrors('Access Denied');

        $data = array(
            'title' => $admin->name,
            'admin' => $admin,
            'roles' => $roles,
            'adminRolesIds' => $adminRolesIds
        );

        return view('admin.admin', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except('_token','_method');
        $admin = Admin::find($id);
        if (isset($admin)){
            $messages = array(
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'
            );
            $validator = Validator::make($input, array(
                'name' => 'required|max:255',
                'email' => 'required|max:255'
            ),$messages);
            if($validator->fails()){
                return redirect()->route('admin.admins.create')->withErrors($validator)->withInput();
            }

            if($request->hasFile('image')){
                $file = $request->file('image');
                $input['image'] = 'assets/images/admins/' . time() . '_' . $file->getClientOriginalName();
                if (isset($admin->image) && is_file(public_path() . '/' . $admin->image)){
                    unlink(public_path() . '/' . $admin->image);
                }
                $file->move(public_path() . '/assets/images/admins/', $input['image']);
            }
            $admin->fill($input);
            if (isset($input['roles'])){
                foreach ($input['roles'] as $role_id){
                    
                    if (!$admin->hasAnyRole(Role::find($role_id)->name)){
                        $admin->roles()->attach($role_id);
                    }                    
                }
                foreach ($admin->roles()->get() as $role){
                    if(!in_array($role->id, $input['roles'])){
                        $admin->roles()->detach($role->id);
                    }
                }
            } else {
                $admin->roles()->detach();
            }
            if ($admin->save()){
                return redirect()->route('admin.admins.edit', $admin->id)->with('status','Пользователь сохранен');
            }

        } else {
            // Abort 404
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (file_exists(public_path($admin->image)) && $admin->image != ''){
            unlink(public_path($admin->image));
        }
        $admin->delete();
        return redirect()->route('admin.admins.index')->with('status','Пользователь удален');
    }
}
