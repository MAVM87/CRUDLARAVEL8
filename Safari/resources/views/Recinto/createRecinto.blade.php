@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{url('/Recinto') }}" method="post" enctype="multipart/form-data">

@csrf
@include('Recinto.formRecinto', ['modo'=>'Crear'])


</form>
</div>
@endsection