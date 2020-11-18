<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = [
            'title'=> 'required|string|max:100',
            'description'=> 'string',
            'price'=> 'required|regex:/^[0-9]+(\.[0-9]{1,3})?$/',
            'picture_path'=>'max:10000|mimes:jpeg,png,jpg'
        ];
        $message = ["required"=>' :attribute es requerido' ];

        $this->validate($request, $fields, $message);
        // $serviceData=request()->all();

        $serviceData = request()->except('_token');
        $serviceData['user_id'] = \Auth::user()->id;

        if($request->hasFile('picture_path')){
            $serviceData['picture_path'] = $request->file('picture_path')->store('uploads','public');
        }


        Service::insert( $serviceData);
        //return response()->json($daserviceData
        return redirect('service')->with('message','Servicio agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
