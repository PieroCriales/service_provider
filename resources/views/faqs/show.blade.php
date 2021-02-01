@extends('adminlte::page')

@section('title', 'Preguntas Frecuentes')

@section('content_header')
    <h1 class="m-0 text-dark">Preguntas Frecuentes</h1>
@stop

@section('content')
          
<div class="row justify-content-center">
        <div class="card col-md-8">
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="#" class="nav-link">
                    <i class="fas fa-user-check"></i> Solicitando Servicio
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-concierge-bell"></i> Adquiriendo servicio
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-user-cog"></i> Configuración de la cuenta
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-shipping-fast"></i> Sobre Service Provider
                  </a>
                </li>
              </ul>
            </div>
        </div>
</div>
@stop