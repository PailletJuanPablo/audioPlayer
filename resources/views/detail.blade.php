@extends('layouts.app')

@section('html_meta')
<title> {{$multimedia->title}} - DDNA Multimedia </title>
<meta property="og:title" content="{{$multimedia->title}}" />
<meta property="og:type" content="music.song" />
<meta property="og:url" content="{{ $multimedia->currentUrl }}" />
<meta property="og:image" content="{{asset('custom/facebook.png')}}" />
<meta property="og:site_name" content="DDNA Multimedia" />
<meta property="fb:app_id" content="1269114079909543" />
<meta property="og:description" content="{{$multimedia->description}}">
<meta property="og:audio" content="{{$multimedia->media_url}}">
<meta property="og:audio:type" content="audio/vnd.facebook.bridge">




@endsection

@section('content')



<div class="container-fluid audioSection">
  <div class="container">
    <div class="row audioData">
      <div class="col-md-8">
        <div class="player">
          <div class="row">
            <div class="col-md-2">
              <div class="controls" id="playerButton">
                <div class="control">
                  <img class="button" src="{{asset('custom/play.png')}}">
                </div>
              </div>
            </div>
            <div class="col-md-10 right">
              <div class="audioDetails">
                <h6>
                  Defensoría de las Niñas, Niños y Adolescentes de la Provincia de Córdoba
                </h6>
                <h3 class="title">
                  {{$multimedia->title}}
                </h3>
              </div>
            </div>
          </div>
          <div id="loader"> Cargando... </div>
          <div id="waveform"></div>
          <div class="timer" id="timer">
            <span id="current"> 0:00 </span> - 
            <span id="remaining"> </span>
          </div>

        </div>

      </div>
      <div class="col-md-4">
        <div class="imageContainer">
          <img class="img-fluid" src="{{asset('custom/logo.png')}}">
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('javascript')
<script>
  let playing = false;
  var wavesurfer = WaveSurfer.create({
      container: '#waveform',
      waveColor: '#dca509',
      progressColor: '#e55e0d',
      pixelRatio: 1,
      backend: 'MediaElement',
  });

  function fancyTimeFormat(time)
{   
    // Hours, minutes and seconds
    var hrs = ~~(time / 3600);
    var mins = ~~((time % 3600) / 60);
    var secs = ~~time % 60;

    // Output like "1:01" or "4:03:59" or "123:03:59"
    var ret = "";

    if (hrs > 0) {
        ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
    }

    ret += "" + mins + ":" + (secs < 10 ? "0" : "");
    ret += "" + secs;
    return ret;
}



$("#timer").hide();
  wavesurfer.load("{{$multimedia->media_url}}");
  wavesurfer.on('ready', function () {
    $("#timer").show();
    var totalTime = wavesurfer.getDuration();
    document.getElementById('remaining').innerText = fancyTimeFormat(totalTime.toFixed(0));
    $("#waveform").show();
    $("#loader").hide();
  });

  $( "#playerButton" ).click(function() {
      if(!playing){
        wavesurfer.play();
        playing = true;
        $(this).children().children().attr("src", "{{asset('custom/pause.png')}}");
      }else{
        wavesurfer.pause();
        playing = false;
        $(this).children().children().attr("src", "{{asset('custom/play.png')}}");
      }
    });

wavesurfer.on('audioprocess', function() {
    if(wavesurfer.isPlaying()) {
        var totalTime = wavesurfer.getDuration(),
        currentTime = wavesurfer.getCurrentTime();
        document.getElementById('current').innerText = fancyTimeFormat(currentTime.toFixed(0));
    }
});


</script>
@endsection