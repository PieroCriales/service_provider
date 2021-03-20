@extends('adminlte::page')
@section('title', 'Game')

@section('content_header')
    <h1 class="m-0 text-dark">Juego de Dados</h1>
@stop

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dado.css') }}">

    <button type="button" onclick="rollthedice()">try it</button>
    <div id="dado"></div>
    <form action="{{ route('game.store') }}" class="form-horinzontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="result" class="control-label">{{'Resultado'}}</label>
            <input
                type="hidden"
                class="form-control"
                name="result"
                id="result"
                value="">
        </div>
        <input type="hidden" name="room_id" id="" value="{{ $room->id }}">
        <input type="submit" class="btn btn-primary" value="Agregar">
    </form>
    {{--    <input id="resultado" value="resultado"></input>--}}
    <script>function rollthedice() {
        var faceValue;
        var output = '';
        faceValue = Math.floor(Math.random() * 6);
        output += "&#x268" + faceValue + "; ";
        document.getElementById('dado').innerHTML = output;
        document.getElementById("result").setAttribute('value', faceValue + 1);
    }
    </script>
@stop
