<?php

namespace App\Http\Controllers;

use App\Models\HistoryBet;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryBetController extends Controller
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
    public function game(Room $room)
    {
        return view('games.create', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryBet  $historyBet
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryBet $historyBet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryBet  $historyBet
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryBet $historyBet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryBet  $historyBet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryBet $historyBet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryBet  $historyBet
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryBet $historyBet)
    {
        //
    }
}
