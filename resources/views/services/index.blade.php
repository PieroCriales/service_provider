@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')

    <div class="col-sm-13">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                Agregar Servicios
            </li>
        </ol>
    </div>


    <h1 class="m-0 text-dark">Administrar</h1>
    @if($busqueda)
        <h5 class="m-0 text-dark">Buscando: "{{$busqueda}}"</h5>
    @endif

@stop

@section('content')



    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
    </div>


    <div class="col-sm-13">
        <ol class="btn btn-success float-sm-left">
            <a href="{{ route('service.create') }}" class="btn btn-success -item">Agregar Servicio <i class="fas fa-plus"></i></a>
        </ol>
    </div>
    <br/>
    <br/>

    <table class="table table-bordered table-striped dataTable table-hover text-center" id="example">

        <thead class="thead-light">
        <tr>
            <th><i class="fas fa-clipboard-check"></i></th>
            <th>Foto  <i class="fas fa-camera"></i></th>
            <th>Titulo  <i class="fas fa-tools"></i></th>
            <th>Categoría  <i class="fas fa-book-open"></i></th>
            <th>Precio(soles)  <i class="fas fa-hand-holding-usd"></i></th>
            <th>Descripción  <i class="fas fa-id-card"></i></th>
            <th>Acciones  <i class="fas fa-mouse"></i></th>
        </tr>

        </thead>

        <tbody>
        @foreach($services as $service)
            <tr>


                <td>{{$loop->iteration}}</td>

                <td>
                    <img src="{{asset('storage').'/'.$service->picture_path}}" class="img-thumbnail img-fluid" alt="" width="200">

                </td>
                <td>{{$service->title}}</td>
                @foreach($type_services as $type_service)
                    @if($service->type_service_id == $type_service->id)
                        <td>{{$type_service->category}}</td>
                    @endif
                @endforeach
                <td>{{$service->price}}</td>
                <td>{{$service->description}}</td>
                <td>

                    <a class="btn btn-warning" href="{{ route('service.edit', $service) }}">Editar
                    </a>
                    <a class="btn btn-info" href="{{ route('service.show', $service) }}">Ver
                    </a>
                    <form method="post" action="{{ route('service.destroy', $service) }}" style="display:inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                    </form>
                </td>
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
