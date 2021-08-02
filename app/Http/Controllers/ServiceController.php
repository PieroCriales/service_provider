<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Service;
use App\Models\Purchase;
use App\Models\Rating;
use App\Models\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('buscar');
        $type_services = TypeService::select('id','category')->get();
        $services = Service::where('user_id', \Auth::user()->id)->get();
        return view('services.index', [
            "services" => $services,
            "busqueda" => $search,
            'type_services' => $type_services
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getall()
    {
        $services = Service::all();
        return view('services.getall', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_services = TypeService::select('id','category')->get();
        return view('services.create', [
            'type_services' => $type_services]);
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
            'description'=> 'string|max:1000',
            'price'=> 'required|regex:/^[0-9]+(\.[0-9]{1,3})?$/|max:7',
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
        $rating_available = False;
        $rating_id = null;
        $purchase = null;
        $purchases = Purchase::where('service_id', '=', $service->id)->get();
        foreach ($purchases as $loop_purchase) {
            if ($loop_purchase->status && !$loop_purchase->rating->comment) {
                $rating_available = True;
                $rating_id = $loop_purchase->rating->id;
            } elseif (!$loop_purchase->status) {
                $purchase = $loop_purchase;
            }
        }

        $rating = Rating::where('id', $rating_id)->first();

        //Calculo del promedio de ratings
        $prom = 0;
        $average_ratings = Purchase::join('ratings', 'rating_id', '=', 'ratings.id')
                    ->where('service_id', $service->id)
                    ->where('comment', '!=', 'null')
                    ->get();

        foreach ($average_ratings as $average_rating){
            $prom = $prom + ($average_rating->type_rating_id)/$average_ratings->count();
        }
        $prom = round($prom,1,PHP_ROUND_HALF_UP);
        //!-- Fin calculo
        $liked_id = array();
        $liked_posts = array();
        $like = null;

        foreach ($service->posts as $post) {
            $like = Like::where([
                ['user_id', \Auth::user()->id],
                ['post_id', $post->id],
            ])->first();
            if ($like) {
                array_push($liked_posts, $post->id);
                array_push($liked_id, $like->id);
            }
        }
        return view("services.show", [
            'service' => $service,
            'rating_available' => $rating_available,
            'rating' => $rating,
            'purchase' => $purchase,
            'prom' => $prom,
            'liked_posts' => $liked_posts,
            'liked_id' => $liked_id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {

        $type_services = TypeService::select('id','category')->get();
        return view('services.edit', [
            'type_services' => $type_services,
            'service'=> $service]);
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
        $fields = [
            'title'=> 'required|string|max:100',
            'description'=> 'string|max:1000',
            'price'=> 'required|regex:/^[0-9]+(\.[0-9]{1,3})?$/|max:7',
            'picture_path'=>'max:10000|mimes:jpeg,png,jpg'
        ];

        if($request->hasFile('picture_path')){

            $fields += ['picture_path'=>'max:10000|mimes:jpeg,png,jpg'];

        }

        $message = ["required"=>' :attribute es requerido' ];

        $this->validate($request, $fields, $message);

        $dataService = request()->except(['_token','_method']);


        if($request->hasFile('picture_path')){
            Storage::delete('public/'.$service->picture_path);
            $dataService['picture_path'] = $request->file('picture_path')->store('uploads','public');
            $service->update($dataService);
            return redirect('service')->with('message', 'Informacion modificada con exito');
        }

        $service->update($dataService);

        return redirect('service')->with('message','Información modificada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
//        if(Storage::delete('public/'.$service->picture_path)){
//            $service->delete();
//        }
        $service->delete();
        return redirect('service')->with('message','Servicio eliminado');
    }
}
