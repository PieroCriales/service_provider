<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Purchase;
use App\Models\Service;
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
        $fields = [
            'firstname'=> 'required|string|max:90',
            'lastname'=> 'required|string|max:90',
            'address'=> 'required|string|max:256',
            'phone_number'=> 'required|string|max:30',
            'profession'=> 'required|string|max:120',
        ];
        $message = ["required"=>' :attribute es requerido' ];
        $this->validate($request, $fields, $message);

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
        $user = \Auth::user();

        $services = Service::where('user_id', $user->id)->get();
        $n_services_finished = 0;
        $n_services_pending = 0;
        foreach ($services as $service) {
            foreach ($service->purchases as $purchase) {
                if ($purchase->status) {
                    $n_services_finished = $n_services_finished + 1;
                } else {
                    $n_services_pending = $n_services_pending + 1;
                }
            }
        }

        return view('profiles.show',  [
            'user' => $user,
            'profile' => $profile,
            'services' => $services,
            'services_pending' => $n_services_pending,
            'services_finished' => $n_services_finished
        ]);

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

        $services = Service::where('user_id', $user->id)->get();
        $n_services_finished = 0;
        $n_services_pending = 0;
        foreach ($services as $service) {
            foreach ($service->purchases as $purchase) {
                if ($purchase->status) {
                    $n_services_finished = $n_services_finished + 1;
                } else {
                    $n_services_pending = $n_services_pending + 1;
                }
            }
        }

        $purchases_pending = Purchase::where([
            ['user_id', $user->id],
            ['status', 0],
        ])->get();

        $purchases_finished = Purchase::where([
            ['user_id', $user->id],
            ['status', 1],
        ])->get();

        return view('profiles.edit',  [
            'user' => $user,
            'profile' => $profile,
            'services' => $services,
            'purchases_pending' => $purchases_pending,
            'purchases_finished' => $purchases_finished,
            'services_pending' => $n_services_pending,
            'services_finished' => $n_services_finished
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
        $fields = [
            'firstname'=> 'required|string|max:90',
            'lastname'=> 'required|string|max:90',
            'address'=> 'required|string|max:256',
            'phone_number'=> 'required|string|max:30',
            'profession'=> 'required|string|max:120',
        ];
        $message = ["required"=>' :attribute es requerido' ];
        $this->validate($request, $fields, $message);

        $user = \Auth::user();

        $profile = Profile::where('user_id', '=', \Auth::user()->id)->first();
        $profile->firstname = $request->input('firstname', '');
        $profile->lastname = $request->input('lastname', '');
        $profile->phone_number = $request->input('phone_number', '');
        $profile->address = $request->input('address', '');
        $profile->profession = $request->input('profession', '');
        $profile->save();

        return redirect('profile/edit');
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
