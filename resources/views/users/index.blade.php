@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
<div class="col-sm-13">

    <table class="table table-bordered table-striped dataTable table-hover text-center" >

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
