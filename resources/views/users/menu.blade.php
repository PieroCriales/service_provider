@extends('adminlte::page')

@section('title', 'Menu')

@section('content_header')
    <h1 class="m-0 text-dark">Admin</h1>
@stop

@section('content')
    <div class="container align-items-center">
        <form action="{{ route('user.change', $user) }}" class="row" method="POST">
            @method('PUT')
            @csrf
            <button type="submit" class="btn btn-block btn-outline-primary">Cambiar rol de usuario</button>
        </form>
        <form action="{{ route('user.delete', $user) }}" class="row" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-block btn-outline-danger">Eliminar usuario</button>
        </form>
    </div>
@stop
