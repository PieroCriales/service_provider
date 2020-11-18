@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{Session::get('Mensaje')}}
    </div>
    @endif

    <a href="{{ route('service.create') }}" class="btn btn-success">Agregar Servicio</a>
    <br/>
    <br/>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Servicio ofrecido</th>
                <th>Precio(soles)</th>
                <th>Acciones</th>
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
                <td>{{$service->price}}</td>
                <td>

                    <a class="btn btn-warning" href="{{ route('service.edit', $service) }}">Editar
                    </a>
                    |
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
    {{$services->links()}}

</div>
@endsection
