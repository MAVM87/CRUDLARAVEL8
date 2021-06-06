<div class="container bg-secondary shadow pb-4">
<h1 class="text-md-center mt-2 pt-4"><strong>{{ $modo }} Recinto</h1>

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
<ul>
    @foreach($errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
</ul>
</div>

@endif

<div class="form-group">

<label for="Nombre">Nombre</label>
<input type="text" class="form-control" name="Nombre" 
value="{{ isset($recinto->Nombre)?$recinto->Nombre:old('Nombre') }}" id="Nombre">
<br>

</div>
<div class="form-group">
<label for="Cpapacidad">Capacidad</label>
<input type="text" class="form-control" name="Capacidad" 
value="{{ isset($recinto->Capacidad)?$recinto->Capacidad:old('Capacidad') }}" id="Capacidad">
<br>

</div>
<div class="form-group">
<label for="">Ubicación</strong></label>
<input type="text" class="form-control" name="Ubicacion" 
value="{{ isset($recinto->Ubicacion)?$recinto->Ubicacion:old('Ubicacion') }}" id="Ubicacion">
<br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

<a class="btn btn-danger" href="{{ url('Recinto/') }}">Cancelar </a>

<br>
</div>