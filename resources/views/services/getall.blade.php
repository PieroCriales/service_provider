@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                        <li class="breadcrumb-item active">Services</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@stop


@section('content')
    <div class="col-sm-13">

        <table class="table table-bordered table-striped dataTable table-hover text-center" id="example">

            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>id</th>
                <th>title</th>
                <th>operario</th>
                <th>categoría</th>
                <th>precio</th>
                <th>contratos</th>
            </tr>

            </thead>

            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$service->id}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{$service->user->profile->firstname . ' ' . $service->user->profile->lastname}}</td>
                    <td>{{$service->type_service->category}}</td>
                    <td>{{$service->price}}</td>
                    <td>{{$service->purchases->count()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @stop

        @section('js')
            <script>
                $(document).ready( function () {
                    $('#example').DataTable();
                } );
            </script>
@stop
