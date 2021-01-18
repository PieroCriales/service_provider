@extends('adminlte::page')

@section('content')

<div class="container">
    <h3 class="pt-0 mt-0"><strong>Chat</strong></h3>
    
    @livewire("chat-form")
    @livewire("chat-list")

</div> 

@endsection('content')