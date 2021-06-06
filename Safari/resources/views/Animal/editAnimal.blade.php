@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/Animal/'.$animal->id_animal) }}" method="post" enctype="multipart/form-data" >
@csrf
{{ method_field('PATCH')}}

@include('Animal.formAnimal', ['modo'=>'Editar'] )



</form>
</div>
@endsection