@extends('layouts.app')

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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Completar Perfil</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="badge badge-danger">Obligatorio</span>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre de usuario</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? '' }}" autocomplete="name" readonly>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? '' }}" autocomplete="email" readonly>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Nombre</label>

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
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido</label>

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
                            <label for="address" class="col-md-4 col-form-label text-md-right">Dirección</label>

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
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Teléfono</label>

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
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Profesión</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="profession" value="{{ $profile->profession ?? '' }}">

                            <!-- @error('name') -->
                                <!--     <span class="invalid&#45;feedback" role="alert"> -->
                            <!--         <strong>{{ $message }}</strong> -->
                                <!--     </span> -->
                            <!-- @enderror -->
                            </div>
                        </div>

                        <div class="row justify-content-around">
                            <button type="submit" class="btn btn-primary">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop
