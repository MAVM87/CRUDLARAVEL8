@extends('layouts.app')

@section('content')
<body class="fondo blur">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-md-center">
                <div class="card-header"><h1><strong>{{ __('Bienvenido al Safari') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('¡Gracias por iniciar sesión!') }}<strong>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8">
<div id="slider1" class="carousel carousel-dark slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#slider1" data-slide-to="0" class="active"></li>
    <li data-target="#slider1" data-slide-to="1"></li>
    <li data-target="#slider1" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="img-thumbnail img-fluid" src="https://cdn.pixabay.com/photo/2017/03/31/15/41/giraffe-2191662_960_720.jpg">
        </div>
        <div class="carousel-item">
          <img class="img-thumbnail img-fluid" src="https://cdn.pixabay.com/photo/2014/10/23/18/56/tiger-500118_960_720.jpg">
        </div>
        <div class="carousel-item">
          <img class="img-thumbnail img-fluid" src="https://cdn.pixabay.com/photo/2017/04/27/15/31/africa-2265801_960_720.jpg">
        </div>
  </div>
  
  <a class="carousel-control-prev" href="#slider1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slider1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>

@endsection
</body>