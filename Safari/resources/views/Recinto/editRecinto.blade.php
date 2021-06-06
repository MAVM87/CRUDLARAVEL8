@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/Recinto/'.$recinto->id_recinto) }}" method="post" enctype="multipart/form-data" >
@csrf
{{ method_field('PATCH')}}

@include('Recinto.formRecinto', ['modo'=>'Editar'] )


</form>
</div>
@endsection