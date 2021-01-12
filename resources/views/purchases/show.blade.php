@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <h1 class="m-0 text-dark">Perfil</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Confirmar que ha finalizado el servicio</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
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

                    <h2 class="my-3">{{$purchase->service->title}}</h2>
                    <div class="row">
                        <div class="col-6">
                            <img src="{{asset('storage').'/'.$purchase->service->picture_path}}" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-6">
                            {{ $purchase->service->description }}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <form method="POST" action="{{ route('purchase.update', $purchase) }}">
                        @method('PUT')
                        @csrf

                        <div class="row justify-content-around">

                            <button type="submit" class="btn btn-secondary">
                                Confirmar
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop
