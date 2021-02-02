@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
<h1 class="m-0 text-dark">Modificar fecha de ejecución de servicio</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Confirmar que la modificación de la compra esté correcta</h3>
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


                <h2 class="my-3">Servicio: {{$purchase->service->title}}</h2>

                <h4 class="my-3"><i class="fas fa-table"></i> Número de Orden: #{{ $purchase->code }}</h4>
                <h4 class="my-3"><i class="fas fa-calendar-alt"></i> Fecha Programada Actualmente :
                    {{ $purchase->due_date }}</h4>
                <h5 class="my-3"><i class="fas fa-user"></i> Cliente: <a
                        href="{{ route('profile.show', $purchase->user->profile) }}">
                        {{ $purchase->user->profile->firstname . " " . $purchase->user->profile->lastname }}
                    </a></h5>
                <div class="row">
                    <div class="col-6">
                        <img src="{{asset('storage').'/'.$purchase->service->picture_path}}" class="product-image"
                            alt="Product Image">
                    </div>
                    <div class="col-6">
                        <div class="modal-body">
                            <form class="form-horizontal" action="{{ route('purchase.update', $purchase) }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <input type="hidden" name="service_id" id="" value="{{ $purchase->id }}">
                                    <input type="hidden" name="user_id" id="" value="{{ \Auth::user()->id }}">
                                    <label>Fecha y hora de atención deseada</label>
                                    <input type="datetime-local" name="due_date" max="3000-12-31" min="1000-01-01"
                                        class="form-control">
                                </div>
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                <button class="btn btn-primary" type="submit">Modificar Fecha</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
</div>
@stop
