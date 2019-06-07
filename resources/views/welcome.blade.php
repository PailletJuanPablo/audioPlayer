@extends('layouts.app')

@section('content')

<div class="hero-wrap js-fullheight">
    <div class="overlay"></div>
    <div class="container-fluid px-0">
        <div class="row d-md-flex no-gutters slider-text align-items-center js-fullheight justify-content-end">
          <div class="imageContainer">
          <img class="img-fluid" src="{{asset('custom/logo.png')}}">
        </div>
            <div class="one-forth d-flex align-items-center ftco-animate js-fullheight">
                <div class="text mt-5">
                    <span class="subheading">Bienvenido</span>
                    <h1 class="mb-3"><span>DDNA</span> <span>Multimedia</span></h1>
                    <p>Contenido Multimedia - Defensoría de las Niñas, Niños y Adolescentes de la Provincia de Córdoba.</p>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection