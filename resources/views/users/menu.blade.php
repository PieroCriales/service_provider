@extends('adminlte::page')

@section('title', 'Menu')

@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                        <li class="breadcrumb-item"><a href="/users/all">Users</a></li>
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
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
