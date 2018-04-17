<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        return view('pages.fexterno');
    }
}
