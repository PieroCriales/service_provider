<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::get();

        return view('purchases.index', compact('purchases'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function general()
    {
        // Usuarios que han pagado el contrato
        $paymented_users = User::join('purchases', 'users.id', '=', 'purchases.user_id')
            ->select(DB::raw('users.id, count(*) as number_purchases'))
            ->where('purchases.paymented', '=', 1)
            ->groupBy('users.id')
            ->with('profile')->get();
        $paymented_user = $paymented_users->where('number_purchases', $paymented_users->max('number_purchases'))->first();

        // Usuarios que no han pagado el contrato
        $no_paymented_users = User::join('purchases', 'users.id', '=', 'purchases.user_id')
            ->select(DB::raw('users.id, count(*) as number_purchases'))
            ->where('purchases.paymented', '=', 0)
            ->groupBy('users.id')
            ->with('profile')->get();
        $no_paymented_user = $no_paymented_users->where('number_purchases', $no_paymented_users->max('number_purchases'))->first();

        // Usuarios que han recibido el servicio
        $recived_service_users = User::join('purchases', 'users.id', '=', 'purchases.user_id')
            ->select(DB::raw('users.id, count(*) as number_purchases'))
            ->where('purchases.status', '=', 1)
            ->groupBy('users.id')
            ->with('profile')->get();
        $recived_service_user = $recived_service_users->where('number_purchases', $recived_service_users->max('number_purchases'))->first();

        // Usuarios que no han recibido el servicio
        $pending_service_users = User::join('purchases', 'users.id', '=', 'purchases.user_id')
            ->select(DB::raw('users.id, count(*) as number_purchases'))
            ->where('purchases.status', '=', 0)
            ->groupBy('users.id')
            ->with('profile')->get();
        $pending_service_user = $pending_service_users->where('number_purchases', $pending_service_users->max('number_purchases'))->first();

        return view('purchases.general', [
            "paymented_users" => $paymented_users,
            "paymented_user" => $paymented_user,
            "no_paymented_users" => $no_paymented_users,
            "no_paymented_user" => $no_paymented_user,
            "recived_service_users" => $recived_service_users,
            "recived_service_user" => $recived_service_user,
            "pending_service_users" => $pending_service_users,
            "pending_service_user" => $pending_service_user,
        ]);
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
        $bd_purchase = Purchase::where([
            ['service_id', $request->service_id],
            ['user_id', $request->user_id],
            ['status', False]
        ])->first();

        //  Validacion para no repetir peticiones
        if (!is_null($bd_purchase)) {
            return back();
        }

        $rating = Rating::create([
            'type_rating_id' => 3
        ]);
        $rating->save();

        $datetime = date("c", strtotime($request->due_date));
        $due_date = Carbon::createFromFormat('Y-m-d\TH:i:sP', $datetime, 'America/Lima');
        $due_date->addHours(5);
        $purchase = Purchase::create([
            'service_id' => $request->service_id,
            'user_id' => $request->user_id,
            'rating_id' => $rating->id,
            'code' => 'pch' . (string)$request->service_id . '-' . (string)$request->user_id . '-' . (string)$rating->id,
            'due_date' => $due_date,
            'seller_confirmation' => False,
            'customer_confirmation' => False,
            'paymented' => False,
            'status' => False,
        ]);
        $purchase->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view('purchases.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Purchase $purchase)
    {
        $purchase->due_date = $request->get('due_date');
        if ($purchase->user_id == \Auth::user()->id) {
            $purchase->customer_confirmation = True;
        } else {
            $purchase->seller_confirmation = True;
        }
        if ($purchase->customer_confirmation && $purchase->seller_confirmation) {
            $purchase->status = True;
        }
        $purchase->save();
        return redirect('profile/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
