@extends('layouts.app')

@section('content')
    <div class="container">

        @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('room_user.store') }}" class="form-horinzontal" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('rooms.form')
            <input type="hidden" name="room_id" id="" value="{{ $room->id }}">
            <input type="submit" class="btn btn-primary" value="Agregar">
        </form>
    </div>
@endsection
