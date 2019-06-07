@extends('layouts.app')

@section('content')


<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');"
  data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-start">
      <div class="col-md-8 ftco-animate text-center text-md-left mb-5">
        <h1 class="mb-3 bread">Añadir Multimedia</h1>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <br>

      <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Titulo </label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Descripción</label>
          <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlFile1"> Archivo</label>
          <input type="file" name="multimediafile" class="form-control-file" id="exampleFormControlFile1">
        </div>


        <button type="submit" class="btn btn-primary">Subir</button>
      </form>


    </div>
  </div>
</div>




@endsection