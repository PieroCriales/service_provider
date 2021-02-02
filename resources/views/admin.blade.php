@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1 class="m-0 text-dark">Admin</h1>
@stop

@section('content')
    <div class="container align-items-center">
        <a href="{{ route('user.index') }}" class="row">
            <button type="button" class="btn btn-block btn-outline-primary">Administrar usuarios</button>
        </a>
        <a href="{{ route('user.index') }}" class="row">
            <button type="button" class="btn btn-block btn-outline-danger">Categoria de servicios</button>
        </a>
        <a href="{{ route('service.getall') }}" class="row">
            <button type="button" class="btn btn-block btn-outline-success">Registros de servicios</button>
        </a>
        <a href="{{ route('purchase.index') }}" class="row">
            <button type="button" class="btn btn-block btn-outline-secondary">Registros de contratos</button>
        </a>
        <a href="{{ route('purchase.general') }}" class="row">
            <button type="button" class="btn btn-block btn-outline-primary">Reportes generales</button>
        </a>
    </div>
@stop
