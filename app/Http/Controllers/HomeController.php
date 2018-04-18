<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vision;
use App\Mission;
use App\Value;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = \App\Area::all();
        return view('home',['areas'=>$areas]);
    }

    public function interno(){
        $areas = \App\Area::all();
        return view('pages.finterno',['areas'=>$areas]);
    }

    public function externo(){
        $fuerzas = \App\Force::all();
        return view('pages.fexterno',['fuerzas'=>$fuerzas]);
    }

    public function misionVision(){
        $mission = Mission::get()->first();
        $vision = Vision::get()->first();

        return view('pages.mision-vision',['mission'=>$mission, 'vision'=>$vision]);
    }

    public function valores(){
        $valores = Value::all();

        return view('pages.valores',['valores'=>$valores]);
    }
}
