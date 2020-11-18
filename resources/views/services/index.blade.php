@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{Session::get('Mensaje')}} 
    </div>

    @endif
    <a href="{{route('service.create')}}"class="btn btn-success">Agregar Servicio</a> 
    <br/>
    <br/>
</div>
@endsection
