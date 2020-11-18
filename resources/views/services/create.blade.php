@extends('layouts.app')

@section('content')
<div class="container">

    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    Seccion para crear servicios

    <form action="{{ route('service.store') }}" class="form-horinzontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('services.form')
        <input type="submit" class="btn btn-primary" value="Agregar">
        <a class="btn btn-outline-secondary" href="{{route('service.index')}}">Regresar</a>
    </form>
</div>
@endsection
