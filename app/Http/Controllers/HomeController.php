<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Vision;
use App\Mission;
use App\Value;

use App\Estrategia;
use App\Objetivo;
use App\Mapa;

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

    public function organigrama(){
        return view('pages.organigrama');
    }

    public function macroproceso(){
        return view('pages.macroproceso');
    }

    public function foda(){
        return view('pages.foda');
    }
    
    public function matrizFoda(){
        return view('pages.matrizFoda');
    }
    
    public function fceCd(){
        $activities = Activity::all();
        return view('pages.fceCd',['activities' => $activities]);
    }

    public function mapaEstrategico(){
        $mapas = Mapa::orderBy('id','ASC')->get();
        return view('pages.mapaEstrategico',['mapas' => $mapas]);
    }

    public function objetivos(){
        $objetivos = Objetivo::paginate(6);
        
        return view('pages.objetivos',
                [
                    'objetivos' => $objetivos
                ]);
    }
}
