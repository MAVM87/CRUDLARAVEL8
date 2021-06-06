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

<h1 class="text-md-center"><strong>Lista de Animales</strong></h1>

<br>
<table class="table table-dark text-md-center shadow">

    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Familia</th>
            <th>Genero</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach( $animales as $animal )
        <tr>
            <td>{{ $animal->id_animal }}</td>

            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$animal->Foto }}" width="100" alt="">
            </td>


            <td>{{ $animal->Nombre }}</td>
            <td>{{ $animal->Familia }}</td>
            <td>{{ $animal->Genero }}</td>
            <td>
            
            <a href="{{url('/Animal/'.$animal->id_animal.'/edit') }}" class="btn btn-primary">Editar</a>
            <form action="{{ url('/Animal/'.$animal->id_animal ) }}" class="d-inline" method="post">
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

{!! $animales->links() !!}

<a href="{{ url('Animal/create') }}" class="btn btn-success">Crear Nuevo Animal </a>
</div>
@endsection