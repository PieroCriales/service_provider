@extends('adminlte::page')

@section('title', 'Gambling House')

@section('content_header')
    <h1 class="m-0 text-dark">Casas de apuestas</h1>
@stop

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
        @endif

        <table class="table table-light table-hover text-center text-middle">
            <thead class="thead-light">
            <tr>
                <th>id</th>
                <th>Salón de apuestas</th>
                <th>Apostadores</th>
                <th>Realizar apuesta</th>
            </tr>
            </thead>

            <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td> <a href="{{route('room_user.create', $room)}}">{{$room->name}}</a></td>
                    <td>{{ $room->nro_gamblers }}</td>
                    @if($room->nro_gamblers == 10)
                        <td><a href="{{ route('game.create', $room) }}">Activado</a></td>
                    @else
                        <td>Desactivado</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
