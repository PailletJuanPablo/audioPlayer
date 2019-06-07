<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Multimedia;
use Storage;
class MultimediaController extends Controller
{
    public function getMultimedia($audio){
        $multimedia = Multimedia::find($audio);
        $multimedia->media_url = Storage::url($multimedia->media_url);
        $multimedia->currentUrl = url()->current();
        return view('detail', ['multimedia'=>$multimedia]);
    }
}
