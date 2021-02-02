@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    </h1><section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                        <li class="breadcrumb-item active">General</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@stop

@section('content')
    <div class="container fluid">
        <h5 class="mb-2">Reporte Usuarios Clientes</h5>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Más contratos pagados</b></span>
                        <span class="info-box-text">{{$paymented_user->profile->firstname . ' ' . $paymented_user->profile->lastname}}</span>
                        <span class="info-box-number">{{$paymented_user->number_purchases}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
            <!-- /.col -->
        <h5 class="mb-2">Mas contratos pagados</h5>
        <table class="table table-bordered table-striped dataTable table-hover text-center" id="example1">

            <thead class="thead-light">
            <tr>
                <th>user id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Contratos</th>
            </tr>

            </thead>

            <tbody>
            @foreach($paymented_users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->profile->firstname}}</td>
                    <td>{{$user->profile->lastname}}</td>
                    <td>{{$user->number_purchases}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow">
                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Más contratos por pagar</b></span>
                        <span class="info-box-text">{{$no_paymented_user->profile->firstname . ' ' . $no_paymented_user->profile->lastname}}</span>
                        <span class="info-box-number">{{$no_paymented_user->number_purchases}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <h5 class="mb-2">Mas contratos por pagar</h5>
        <table class="table table-bordered table-striped dataTable table-hover text-center" id="example2">

            <thead class="thead-light">
            <tr>
                <th>user id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Contratos</th>
            </tr>

            </thead>

            <tbody>
            @foreach($no_paymented_users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->profile->firstname}}</td>
                    <td>{{$user->profile->lastname}}</td>
                    <td>{{$user->number_purchases}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow">
                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Más contratos recibidos</b></span>
                        <span class="info-box-text">{{$recived_service_user->profile->firstname . ' ' . $recived_service_user->profile->lastname}}</span>
                        <span class="info-box-number">{{$recived_service_user->number_purchases}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <h5 class="mb-2">Mas contratos recibidos</h5>
        <table class="table table-bordered table-striped dataTable table-hover text-center" id="example3">

            <thead class="thead-light">
            <tr>
                <th>user id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Contratos</th>
            </tr>

            </thead>

            <tbody>
            @foreach($recived_service_users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->profile->firstname}}</td>
                    <td>{{$user->profile->lastname}}</td>
                    <td>{{$user->number_purchases}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow">
                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Más contratos pendientes</b></span>
                        <span class="info-box-text">{{$pending_service_user->profile->firstname . ' ' . $pending_service_user->profile->lastname}}</span>
                        <span class="info-box-number">{{$pending_service_user->number_purchases}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <h5 class="mb-2">Mas contratos pendientes</h5>
        <table class="table table-bordered table-striped dataTable table-hover text-center" id="example4">

            <thead class="thead-light">
            <tr>
                <th>user id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Contratos</th>
            </tr>

            </thead>

            <tbody>
            @foreach($pending_service_users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->profile->firstname}}</td>
                    <td>{{$user->profile->lastname}}</td>
                    <td>{{$user->number_purchases}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('#example1').DataTable();
        } );
        $(document).ready( function () {
            $('#example2').DataTable();
        } );
        $(document).ready( function () {
            $('#example3').DataTable();
        } );
        $(document).ready( function () {
            $('#example4').DataTable();
        } );
    </script>
@stop
