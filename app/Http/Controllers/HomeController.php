<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Multimedia;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add()
    {
        return view('add');
    }

    public function save(Request $request)
    {
        $multimedia = new Multimedia;
       $path = $request->file('multimediafile')->store('files');
  //     return $path;

     //   $contents = Storage::url('files/IhHYnY3TzxBOfB6dSkttDp6GM0aGtPdlUgiLyu5g.png');
      //  return $contents;

        $multimedia->fill($request->all());
        $multimedia->media_url = $path;
        $multimedia->save();
        return $multimedia;
    }


}
