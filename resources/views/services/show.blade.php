@extends('adminlte::page')
@section('title', 'Service Profile')

@section('content_header')
    <h1 class="m-0 text-dark">Perfil del Servicio</h1>
@stop

@section('content')

    <div class="card card-solid">
        <div class="card-body">
            <div class ="row">
                <div class = "col-12 col-sm-6">
                    <h3></h3>
                    <div class="col-12">
                        <img src="{{asset('storage').'/'.$service->picture_path}}" class="product-image" alt="Product Image">
                    </div>
                </div>


                <div class="col-12 col-sm-6">


                    <h1 class="my-3">{{$service->title}}</h1>
                    <h3> Descripcion del servicio </h3>
                    <p> {{$service->description}}</p>

                    <h3 class="my-3">Ofertante</h3>

                    <div class = "col-md-7">
                        <div class = "card card-dark">
                            <div class = "card-body box-profile">
                                <div class = "text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ Gravatar::get($service->user->email)}}" alt="User profile picture">
                                </div>
                                <h3 class = "profile-username text-center"> {{ $service->user->profile->firstname ?? '' }} {{ $service->user->profile->lastname ?? '' }}   </h3>
                                <p class="text-muted text-center">{{ $service->user->profile->profession ?? '' }}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Puntuacion</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Seguidores</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Total servicios</b> <a class="float-right">20</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                    <h3>Precio</h3>
                    <div class="bg-green py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            S/ {{$service->price}}
                        </h2>
                    </div>
                    <div class="mt-4">
                        <div class="btn btn-primary btn-lg btn-flat">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Adquirir Servicio
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
