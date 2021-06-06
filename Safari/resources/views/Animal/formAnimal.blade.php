<div class="container bg-secondary shadow pb-4">
<h1 class="text-md-center mt-2 pt-4"><strong>{{ $modo }} Animal</h1>

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
value="{{ isset($animal->Nombre)?$animal->Nombre:old('Nombre') }}" id="Nombre">
</div>

<div class="form-group">
<label for="Familia">Familia</label>
<input type="text" class="form-control" name="Familia" 
value="{{ isset($animal->Familia)?$animal->Familia:old('Familia') }}" id="Familia">
</div>

<div class="form-group">
<label for="Genero">Genero</label>
<input type="text" class="form-control" name="Genero" 
value="{{ isset($animal->Genero)?$animal->Genero:old('Genero') }}" id="Genero">
</div>

<div class="form-group">
@if(isset($animal->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$animal->Foto }}" width="100" alt="">
@endif
<label for="Foto"></label>
<input type="file" class="form-control" name="Foto" value="" id="Foto">
</div>

<div class="form-group">
<label for="recintos_id">recintos_id</strong></label>
<input type="text" class="form-control" name="recintos_id" 
value="{{ isset($animal->recintos_id)?$animal->recintos_id:old('recintos_id') }}" id="recintos_id">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-danger" href="{{ url('Animal/') }}">Cancelar</a>

<br>
</div>