@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1 class="m-0 text-dark">Perfil</h1>
@stop

@section('content')
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-3">
                <div class = "card card-dark">
                    <div class = "card-body box-profile">
                        <div class = "text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ Gravatar::get($profile->user->email)}}" alt="User profile picture">
                        </div>
                        <h3 class = "profile-username text-center"> {{ $profile->firstname ?? '' }} {{ $profile->lastname ?? '' }}   </h3>
                        <p class="text-muted text-center">{{ $profile->profession ?? '' }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Puntuacion </b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Seguidores</b> <a class="float-right">543</a>
                            </li>
                                <li class="list-group-item">
                                    <b>Total servicios</b> <a class="float-right">
                                    @foreach($profile->user->services as $service)
                                        @if($loop->last)
                                            {{$loop->count}}
                                        @endif
                                    @endforeach
                                    </a>
                                </li>
                        </ul>

                    </div>
                </div>

                    <div class="col-12">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Likes</span>
                                <span class="info-box-number">41,410</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Sales</span>
                                <span class="info-box-number">{{$services_finished}}</span>
                            </div>
                        </div>
                    </div>
            </div>
                    <div class = "col-md-9">
                        <div class = "card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab">Historial</a></li>
                                </ul>
                            </div>
                    <div class = "card-body ">
                        <div class="tab-content">
                            <!-- /.tab-pane -->
                                <div class="tab-pane active" id="activity">
                                    <div class="post">
                                        <div class="card">
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <thead>
                                                            <tr>
                                                                <th><i class="fas fa-clipboard-check"></i></th>
                                                                <th>Codigo del servicio</th>
                                                                <th>Titulo</th>
                                                                <th>Precio</th>
                                                                <th>Descripción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($profile->user->services as $service)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$service->id}}</td>
                                                                    <td>{{$service->title}}</td>
                                                                    <td>{{$service->price}}</td>
                                                                    <td>{{$service->description}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>              
                                    </div>
                                </div>


                        </div>
                    </div>
        </div>
    </div>
@stop
