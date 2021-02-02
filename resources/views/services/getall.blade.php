@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <div class="col-sm-13">

        <table class="table table-bordered table-striped dataTable table-hover text-center" id="example">

            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>id</th>
                <th>title</th>
                <th>operario</th>
                <th>price</th>
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
