<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\GateHelper;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!GateHelper::all('VIEW_USERS')){
            return redirect()->route('admin.404');
        }
        $users = User::all();
        $data = array(
            'title' => 'Пользователи',
            'users' => $users
        );
        return view('admin.users', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Добавление пользователя',
        );

        return view('admin.user', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $input['password'] = bcrypt($input['name']);

        $messages = array(
            'required' => 'Поле :attribute обязательно к заполнению',
            'unique' => 'Поле :attribute должно быть уникальным'
        );
        $validator = Validator::make($input, array(
            'name' => 'required|max:255|unique:users',
            'email' => 'required|max:255|unique:users'
        ),$messages);
        if($validator->fails()){
            return redirect()->route('admin.users.create')->withErrors($validator)->withInput();
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $input['image'] = 'assets/images/users/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/assets/images/users/', $input['image']);
        }
        $user = new User();
        $user->fill($input);
        if ($user->save()){
            return redirect()->route('admin.users.index')->with('status','Пользователь добавлен');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (!GateHelper::all('UPDATE_USERS', array('user' => $user))){
            return redirect()->route('admin.404');
        }

        $data = array(
            'title' => $user->name,
            'user' => $user
        );

        return view('admin.user', $data);
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
        $user = User::find($id);
        if (!GateHelper::all('UPDATE_USERS', array('user' => $user))){
            return redirect()->route('admin.404');
        }
        if (isset($user)){
            $messages = array(
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'
            );
            $validator = Validator::make($input, array(
                'name' => 'required|max:255',
                'email' => 'required|max:255|unique:users,email,'.$user->id,
            ),$messages);
            if($validator->fails()){
                return redirect()->route('admin.users.create')->withErrors($validator)->withInput();
            }

            if($request->hasFile('image')){
                $file = $request->file('image');
                $input['image'] = 'assets/images/users/' . time() . '_' . $file->getClientOriginalName();
                if (isset($user->image) && is_file(public_path() . '/' . $user->image)){
                    unlink(public_path() . '/' . $user->image);
                }
                $file->move(public_path() . '/assets/images/users/', $input['image']);
            }
            $user->fill($input);
            if ($user->save()){
                return redirect()->route('admin.users.edit', $user->id)->with('status','Пользователь сохранен');
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
        if (!GateHelper::all('DELETE_USERS')){
            return redirect()->route('admin.404');
        }
        $user = User::find($id);
        $orders = Order::where('user_id', $user->id)->get();
        if (count($orders) > 0){
            foreach ($orders as $order){
                $order->delete();
                DB::delete('DELETE FROM order_good WHERE order_id = ?', [$order->id]);
            }
        }
        if (file_exists(public_path($user->image)) && $user->image != ''){
            unlink(public_path($user->image));
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('status','Пользователь удален');
    }
}
