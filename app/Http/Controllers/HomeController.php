<?php

namespace App\Http\Controllers;
use App\Models\TypeService;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $search = $request->get('buscar');
        $type_services = TypeService::select('id','category')->get();
        $services = Service::get();

        return view('home', [
            "services" => $services,
            "busqueda" => $search,
            'type_services' => $type_services
        ]);
    }
}
