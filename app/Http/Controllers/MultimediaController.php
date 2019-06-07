<?php

namespace App\Http\Controllers;

use App\Multimedia;
use Storage;
class MultimediaController extends Controller
{
    public function getMultimedia($audio){
        $multimedia = Multimedia::find($audio);
        if(!$multimedia){
            return redirect('https://ddna.cba.gov.ar/');
        }
        $multimedia->media_url = Storage::url($multimedia->media_url);
        $multimedia->currentUrl = url()->current();
        return view('detail', ['multimedia'=>$multimedia]);
    }
}
