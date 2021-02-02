@extends('adminlte::page')

@section('title', 'Usuarios')

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
                        <li class="breadcrumb-item active">Users</li>
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
            <th>id</th>
            <th>username</th>
            <th>email</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>address</th>
            <th>administrator</th>
            <th>telephone</th>
            <th>profession</th>
        </tr>

        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>
                    <a href="{{ route('user.menu', $user) }}">{{$user->name}}</a>
                </td>
                <td>{{$user->email}}</td>
                <td>{{$user->profile->firstname}}</td>
                <td>{{$user->profile->lastname}}</td>
                <td>{{$user->profile->address}}</td>
                <td>{{$user->fullaccess}}</td>
                <td>{{$user->profile->phone_number}}</td>
                <td>{{$user->profile->profession}}</td>
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
