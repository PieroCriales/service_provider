<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'rating_star'=> 'required|int',
            'rating_com'=> 'required|string|max:500',
        ];
        $message = ["required"=>' :attribute es requerido' ];

        $this->validate($request, $fields, $message);
        
        $ratings = DB::table('ratings')->get();

        foreach ($ratings as $rating){
            if ($rating->user_id == $request->user_id && $rating->service_id == $request->service_id){
                return back()->withErrors(['Usted ya calificó este servicio']);
            }
        }
        $rating = Rating::create([
            'user_id' => $request->get('user_id'),
            'service_id' => $request->get('service_id'),
            'rating_star' =>$request->get('rating_star'),
            'rating_com' => $request->get('rating_com'),
        ]);


        return back();
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
