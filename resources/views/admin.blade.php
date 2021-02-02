@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
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
