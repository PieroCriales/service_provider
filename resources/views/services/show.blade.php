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
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalCenter">Adquirir Servicio</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Petición de servicio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" action="{{ route('purchase.store') }}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="hidden" name="service_id" id="" value="{{ $service->id }}">
                                        <input type="hidden" name="user_id" id="" value="{{ \Auth::user()->id }}">
                                        <label>Fecha y hora de atención deseada</label>
                                        <input type="datetime-local" name="due_date" max="3000-12-31"
                                                min="1000-01-01" class="form-control">
                                    </div>
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    <button class="btn btn-primary" type="submit">Adquirir Servicio</button>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->
                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" role="tab" aria-controls="product-desc" aria-selected="true" href="#">Comentarios</a>
                        </div>
                    </nav>
                    <div class="col-md-12 p-3" id="nav-tabContent">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('post.store') }}" method="post">
                                    {{csrf_field()}}
                                    <div class="input-group input-group-sm mb-0">
                                        <input class="form-control form-control-sm" type="text" name="body" id="" placeholder="Consultanos aquí...">
                                        <input type="hidden" name="service_id" id="" value="{{ $service->id }}">
                                        <input type="hidden" name="user_id" id="" value="{{ \Auth::user()->id }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-pane fade show active" role="tabpanel">
                            @include('posts.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
