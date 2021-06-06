@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<h1 class="text-md-center"><strong>Lista de Recintos</strong></h1>
<br>

<table class="table table-dark text-md-center shadow">

    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Capacidad</th>
            <th>Ubicación</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach( $recintos as $recinto )
        <tr>
            <td>{{ $recinto->id_recinto }}</td>
            <td>{{ $recinto->Nombre }}</td>
            <td>{{ $recinto->Capacidad }}</td>
            <td>{{ $recinto->Ubicacion }}</td>
            <td>

            <a class="btn btn-primary" href="{{url('/Recinto/'.$recinto->id_recinto.'/edit') }}">Editar </a>

            <form action="{{ url('/Recinto/'.$recinto->id_recinto) }}" class="d-inline" method="post">
           @csrf
           {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?')"
            value="Borrar">

            </form>


            </td>
        </tr>
    @endforeach

    </tbody>

</table>
{!! $recintos->links() !!}
<a class="btn btn-success" href="{{ url('Recinto/create') }}">Crear Nuevo Recinto</a>
</div>
@endsection