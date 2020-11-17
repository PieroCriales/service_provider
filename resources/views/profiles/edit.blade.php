@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar Perfil
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="">
                        @method('PUT')

                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Firstname</label>

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
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Lastname</label>

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
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $profile->address ?? '' }}">

                                <!-- @error('name') -->
                                <!--     <span class="invalid&#45;feedback" role="alert"> -->
                                <!--         <strong>{{ $message }}</strong> -->
                                <!--     </span> -->
                                <!-- @enderror -->
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="float-right">
                        <form method="POST" action="{{ route('user.destroy') }}">
                          @method('DELETE')
                          @csrf
                          <div class="col-md-6">
                              <input
                                  class="btn btn-sn btn-danger"
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
@endsection
