<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        $user = \Auth::user();

        return view('profiles.create', [
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        $profile = Profile::create([
            'user_id' => \Auth::user()->id,
            'firstname' => $request->input('firstname', ''),
            'lastname' => $request->input('lastname', ''),
            'address' => $request->input('address', ''),
            'phone_number' => $request->input('phone_number', ''),
            'profession' => $request->input('profession', '')
        ]);

        $profile->save();

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = \Auth::user();
        $profile = Profile::where('user_id', '=', \Auth::user()->id)->first();

        if ($profile == null) {
            return view('profiles.create', [
                'user' => $user
            ]);
        }

        return view('profiles.edit',  [
            'user' => $user,
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile = Profile::where('user_id', '=', \Auth::user()->id)->first();
        $profile->delete();

        $user = \Auth::user();
        $user->delete();

        return back();
    }
}
