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

    <h3>Seccion para editar servicio</h3>

    <form action="{{ route('service.update', $service) }}" class="form-horinzontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        @include('services.form')
        <input type="submit" class="btn btn-primary" value="Modificar">
        <a class="btn btn-outline-secondary" href="{{route('service.index')}}">Regresar</a>
    </form>
</div>
@endsection
