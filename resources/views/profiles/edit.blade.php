@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <h1 class="m-0 text-dark">Perfil</h1>
@stop

@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-3">
                <div class = "card card-dark">
                    <div class = "card-body box-profile">
                        <div class = "text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ Gravatar::get($user->email)}}" alt="User profile picture">
                        </div>
                        <h3 class = "profile-username text-center"> {{ $profile->firstname ?? '' }} {{ $profile->lastname ?? '' }}   </h3>
                        <p class="text-muted text-center">{{ $profile->profession ?? '' }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Puntuacion </b> <a class="float-right">-</a>
                            </li>
                            <li class="list-group-item">
                              <b>Seguidores</b> <a class="float-right">-</a>
                            </li>
                            <li class="list-group-item">
                              <b>Total servicios</b> <a class="float-right">-</a>
                            </li>
                          </ul>

                    </div>

                </div>
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Acerca de mi</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <strong><i class="fa fa-book margin-r-5"></i>Education</strong>

                      <p class="text-muted">
                        {{ $profile->profession ?? '' }}
                      </p>

                      <hr>

                      <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                      <p class="text-muted">Lima,Perú</p>

                      <hr>

                      <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                      <p>
                        {{ $profile->profession ?? '' }}
                      </p>

                      <hr>

                      <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
            <div class = "col-md-9">
                <div class = "card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#servof" data-toggle="tab">Servicios ofrecidos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#servre" data-toggle="tab">Servicios requeridos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Historial</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuracion</a></li>
                        </ul>
                    </div>
                <div class = "card-body ">
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane active" id="servof">
                            <div class="post">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $services_pending }}</h3>
                                        <p>Servicios no realizados</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="row">
                                  <div class="col-12">
                                    <div class="card">
                                      <div class="card-header">
                                        <h3 class="card-title">Servicios por atender</h3>

                                        <div class="card-tools">
                                          <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- /.card-header -->
                                      <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                          <thead>
                                            <tr>
                                              <th>Codigo</th>
                                              <th>Servicio ofrecido</th>
                                              <th>Cliente</th>
                                              <th>Fecha estimada</th>
                                              <th>Confirmacion de cliente</th>
                                              <th>Pago</th>
                                              <th>Chat</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($services as $service)
                                              @foreach ($service->purchases as $purchase)
                                                @if(!$purchase->status)
                                                  <tr>
                                                    <td>
                                                        <a href="{{ route('purchase.update', $purchase) }}" class="">
                                                            {{ $purchase->code }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                      <a href="{{ route('service.show', $service) }}">
                                                      {{ $service->title }}
                                                      </a>
                                                    </td>
                                                    <td>
                                                      <a href="{{ route('profile.show', $purchase->user->profile) }}">
                                                      {{ $purchase->user->profile->firstname . " " . $purchase->user->profile->lastname }}
                                                      </a>
                                                    </td>
                                                    <td>
                                                    <a href="/purchase/{{$purchase->id}}/edit" class="">
                                                      {{ $purchase->due_date }}
                                                    </a>
                                                    </td>
                                                    @if($purchase->customer_confirmation)
                                                    <td>Confirmado</td>
                                                    @else
                                                    <td>Por confirmar</td>
                                                    @endif
                                                    @if($purchase->paymented)
                                                        <td>Cancelado</td>
                                                    @else
                                                        <td>Por cancelar</td>
                                                    @endif
                                                    <td>
                                                    <a type="button" href="/purchase/mensajeria/{{$purchase->code}}">Chat</a>
                                                    </td>
                                                  </tr>
                                                @endif
                                              @endforeach
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                      <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                  </div>
                                </div>
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                      <h3>{{ $services_finished }}<sup style="font-size: 20px"></sup></h3>

                                        <p>Servicios realizados</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="row">
                                  <div class="col-12">
                                    <div class="card">
                                      <div class="card-header">
                                        <h3 class="card-title">Servicios atendidos</h3>

                                        <div class="card-tools">
                                          <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- /.card-header -->
                                      <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                          <thead>
                                            <tr>
                                              <th>Codigo</th>
                                              <th>Servicio ofrecido</th>
                                              <th>Cliente</th>
                                              <th>Confirmacion de cliente</th>
                                              <th>Satisfacción</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($services as $service)
                                              @foreach ($service->purchases as $purchase)
                                                @if($purchase->status)
                                                  <tr>
                                                    <td>{{ $purchase->code }}</td>
                                                    <td>
                                                        <a href="{{ route('service.show', $service) }}">
                                                        {{ $service->title }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('profile.show', $purchase->user->profile) }}">
                                                        {{ $purchase->user->profile->firstname . " " . $purchase->user->profile->lastname }}
                                                        </a>
                                                    </td>
                                                    @if($purchase->customer_confirmation)
                                                    <td>Confirmado</td>
                                                    @else
                                                    <td>Por confirmar</td>
                                                    @endif
                                                    <td>{{ $purchase->rating->type_rating->tier }}</td>
                                                  </tr>
                                                @endif
                                              @endforeach
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                      <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                  </div>
                                </div>
                                <!-- small box -->

                            </div>
                        </div>

                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="servre">
                            <div class="post">
                                <div class="small-box bg-info">
                                  <div class="inner">
                                    <h3>{{ $purchases_pending->count() }}</h3>
                                    <p>Servicios no recibidos</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-bag"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <!-- small box -->
                                <div class="row">
                                  <div class="col-12">
                                    <div class="card">
                                      <div class="card-header">
                                        <h3 class="card-title">Servicios no recibidos</h3>

                                        <div class="card-tools">
                                          <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- /.card-header -->
                                      <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                          <thead>
                                            <tr>
                                              <th>Código</th>
                                              <th>Servicio requerido</th>
                                              <th>Servidor</th>
                                              <th>Confirmacion de servidor</th>
                                              <th>Pago</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach ($purchases_pending as $purchase)
                                                <tr>
                                                  <td>
                                                      <a href="{{ route('purchase.show', $purchase) }}" class="">
                                                          {{ $purchase->code }}
                                                      </a>
                                                  </td>
                                                  <td>
                                                    <a href="{{ route('service.show', $purchase->service) }}">
                                                    {{ $purchase->service->title }}
                                                    </a>
                                                  </td>
                                                  <td>
                                                    <a href="{{ route('profile.show', $purchase->service->user->profile) }}">
                                                    {{ $purchase->service->user->profile->firstname . " " . $purchase->service->user->profile->lastname }}
                                                    </a>
                                                  </td>
                                                  @if($purchase->seller_confirmation)
                                                  <td>Confirmado</td>
                                                  @else
                                                  <td>Por confirmar</td>
                                                  @endif
                                                  @if($purchase->paymented)
                                                  <td>Cancelado</td>
                                                  @else
                                                  <td>Por cancelar</td>
                                                  @endif
                                                </tr>
                                              @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                      <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                  </div>
                                </div>
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                      <h3>{{ $purchases_finished->count() }}<sup style="font-size: 20px"></sup></h3>

                                        <p>Servicios recibidos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <!-- small box -->
                                <div class="row">
                                  <div class="col-12">
                                    <div class="card">
                                      <div class="card-header">
                                        <h3 class="card-title">Servicios recibidos</h3>

                                        <div class="card-tools">
                                          <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- /.card-header -->
                                      <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                          <thead>
                                            <tr>
                                              <th>Codigo</th>
                                              <th>Servicio requerido</th>
                                              <th>Servidor</th>
                                              <th>Confirmacion de servidor</th>
                                              <th>Satisfacción</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach ($purchases_finished as $purchase)
                                                <tr>
                                                  <td>{{ $purchase->code }}</td>
                                                  <td>
                                                    <a href="{{ route('service.show', $purchase->service) }}">
                                                    {{ $purchase->service->title }}
                                                    </a>
                                                  </td>
                                                  <td>
                                                    <a href="{{ route('profile.show', $purchase->service->user->profile) }}">
                                                    {{ $purchase->service->user->profile->firstname . " " . $purchase->service->user->profile->lastname }}
                                                    </a>
                                                  </td>
                                                  @if($purchase->seller_confirmation)
                                                  <td>Confirmado</td>
                                                  @else
                                                  <td>Por confirmar</td>
                                                  @endif
                                                  <td>{{ $purchase->rating->type_rating->tier }}</td>
                                                </tr>
                                              @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                      <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                  </div>
                                </div>
                                <!-- small box -->
                            </div>
                        </div>

                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <div class="btn-group">
                                <div class="timeline-item">
                                    <h3 class="timeline-header"><a href="#">Equipo de soporte</a> te ha enviado un email !</h3>
                                    <h5>
                                      <i>13 sep. 2020</i>
                                    </h5>
                                    <div class="timeline-body">
                                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                      quora plaxo ideeli hulu weebly balihoo...
                                    </div>
                                    <div class="timeline-footer">
                                      <a class="btn btn-primary btn">Read more</a>
                                      <a class="btn btn-danger btn">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a href="#">User profile </a> posteo un comentario</h3>
                                <h5>
                                    <i>12 sep. 2020</i>
                                    </h5>
                                <div class="timeline-body">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                    quora plaxo ideeli hulu weebly balihoo...
                                  </div>
                                  <div class="timeline-footer">
                                    <a class="btn btn-primary btn">Read more</a>
                                    <a class="btn btn-danger btn">Delete</a>
                                  </div>
                            </div>
                            <hr>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a href="#">User profile</a> posteo un comentario</h3>
                                <h5>
                                    <i>11 sep. 2020</i>
                                    </h5>
                                <div class="timeline-body">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                    quora plaxo ideeli hulu weebly balihoo...
                                  </div>
                                  <div class="timeline-footer">
                                    <a class="btn btn-primary btn">Read more</a>
                                    <a class="btn btn-danger btn">Delete</a>
                                  </div>
                            </div>
                            <hr>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a href="#">User profile</a> te envio un correo ! ! !</h3>
                                <h5>
                                    <i>10 sep. 2020</i>
                                    </h5>
                                <div class="timeline-body">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                    quora plaxo ideeli hulu weebly balihoo...
                                  </div>
                                  <div class="timeline-footer">
                                    <a class="btn btn-primary btn">Read more</a>
                                    <a class="btn btn-danger btn">Delete</a>
                                  </div>
                            </div>
                        </div>

                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="settings">
                            <form method="POST" action="{{ route('profile.update') }}">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">Nombre de usuario</label>
                                        <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" readonly>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email" readonly>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="firstname" class="col-md-2 col-form-label text-md-right">Nombre</label>

                                    <div class="col-md-6">
                                        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $profile->firstname ?? '' }}">

                                        <!-- @error('name') -->
                                        <!--     <span class="invalid&#45;feedback" role="alert"> -->
                                        <!--         <strong>{{ $message }}</strong> -->
                                        <!--     </span> -->
                                        <!-- @enderror -->
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lastname" class="col-md-2 col-form-label text-md-right">Apellido</label>

                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $profile->lastname ?? '' }}">

                                        <!-- @error('name') -->
                                        <!--     <span class="invalid&#45;feedback" role="alert"> -->
                                        <!--         <strong>{{ $message }}</strong> -->
                                        <!--     </span> -->
                                        <!-- @enderror -->
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-2 col-form-label text-md-right">Dirección</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control" name="address" value="{{ $profile->address ?? '' }}">

                                        <!-- @error('name') -->
                                        <!--     <span class="invalid&#45;feedback" role="alert"> -->
                                        <!--         <strong>{{ $message }}</strong> -->
                                        <!--     </span> -->
                                        <!-- @enderror -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-2 col-form-label text-md-right">Teléfono</label>

                                    <div class="col-md-6">
                                        <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $profile->phone_number ?? '' }}">

                                        <!-- @error('name') -->
                                        <!--     <span class="invalid&#45;feedback" role="alert"> -->
                                        <!--         <strong>{{ $message }}</strong> -->
                                        <!--     </span> -->
                                        <!-- @enderror -->
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="profession" class="col-md-2 col-form-label text-md-right">Profesión</label>

                                    <div class="col-md-6">
                                        <input id="profession" type="text" class="form-control" name="profession" value="{{ $profile->profession ?? '' }}">

                                        <!-- @error('name') -->
                                        <!--     <span class="invalid&#45;feedback" role="alert"> -->
                                        <!--         <strong>{{ $message }}</strong> -->
                                        <!--     </span> -->
                                        <!-- @enderror -->
                                    </div>
                                </div>

                                <div class="form-group row mb-2 justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        Editar
                                    </button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('user.destroy') }}">
                                @method('DELETE')
                                @csrf
                                <div class="form-group row mb-0 justify-content-end">
                                    <input
                                        class="btn btn-sn btn-outline-danger"
                                        type="submit"
                                        value="Eliminar"
                                        onclick="return confirm('¿Desea eliminar su cuenta de usuario?')">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
