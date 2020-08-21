<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $data = array(
            'title' => 'Сервисы',
            'services' => $services
        );

        return view('admin.services', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icons = config('service_icons');
        $data = array(
            'title' => 'Добавление сервиса',
            'icons' => $icons
        );

        return view('admin.service', $data);
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
        
        $messages = array(
            'required' => 'Поле :attribute обязательно к заполнению',
            'unique' => 'Поле :attribute должно быть уникальным'
        );
        
        $validator = Validator::make($input, array(
            'name' => 'required|max:255',
        ),$messages);
        if($validator->fails()){
            return redirect()->route('admin.services.create')->withErrors($validator)->withInput();
        }
        
        $service = new Service();
        $service->fill($input);
        if ($service->save()){
            return redirect()->route('admin.services.index')->with('status','Сервис добавлен');
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
        $service = Service::find($id);
        $icons = config('service_icons');

        $data = array(
            'title' => $service->name,
            'service' => $service,
            'icons' => $icons
        );

        return view('admin.service', $data);
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
        $input = $request->except('_token');
                
        $messages = array(
            'required' => 'Поле :attribute обязательно к заполнению',
            'unique' => 'Поле :attribute должно быть уникальным'
        );
        
        $validator = Validator::make($input, array(
            'name' => 'required|max:255',
        ),$messages);
        if($validator->fails()){
            return redirect()->route('admin.services.edit', $id)->withErrors($validator)->withInput();
        }
        
        $service = Service::find($id);
        $service->fill($input);
        if ($service->save()){
            return redirect()->route('admin.services.edit', $id)->with('status','Сервис сохранен');
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
        $service = Service::find($id);
        $service->delete();
        
        return redirect()->route('admin.services.index')->with('status','Сервис удален');
    }
}
