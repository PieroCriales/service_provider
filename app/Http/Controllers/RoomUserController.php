<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Room;
use App\Models\RoomUser;
use Illuminate\Http\Request;

class RoomUserController extends Controller
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
    public function create(Room $room)
    {
        return view('rooms.create', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = Profile::where("user_id", "=", \Auth::user()->id)->first();

        $room_user = RoomUser::where([
            ['user_id', '=', \Auth::user()->id],
            ['room_id', '=', $request->room_id]
        ])->first();

        $room = Room::where('id', '=', $request->room_id)->first();

        if (!$room_user && $room->nro_gamblers < 10) {
            $profile->chips = $profile->chips - intval($request->count_chips);
            $profile->save();
            $room_user = RoomUser::create([
                'user_id' => \Auth::user()->id,
                'room_id' => $request->room_id
            ]);
            $room_user->bet = intval($request->bet);
            $room_user->finalized = false;
            $room_user->save();

            $room->nro_gamblers += 1;
            $room->save();
        }

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomUser  $roomUser
     * @return \Illuminate\Http\Response
     */
    public function show(RoomUser $roomUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomUser  $roomUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomUser $roomUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomUser  $roomUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomUser $roomUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomUser  $roomUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomUser $roomUser)
    {
        //
    }
}
