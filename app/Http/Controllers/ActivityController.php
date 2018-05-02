<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;


class ActivityController extends Controller
{

    public function new($area_id){
        $area_id = $area_id;
        return view('actividades.create', ['area_id' => $area_id]);
    }
    public function edit($id){
        $activity = \App\Activity::find($id);
        return view('actividades.edit', ['activity' => $activity]);
    }
    public function store(Request $request){
        if (!$request->ajax()) return redirect('/home');
        $activity = new \App\Activity();
        $activity->nombre = $request->nombre;
        $activity->area_id = $request->area_id;
        $activity->alta = 0;        
        $activity->media = 0;        
        $activity->baja = 0;        
        $activity->muy_bueno = 0;        
        $activity->bueno = 0;        
        $activity->deficiente = 0;        
        $activity->muy_deficiente = 0;
        $activity->valor = 0;
        $activity->save();
    }
    public function internoEdit($id){
        $activity = \App\Activity::findOrFail($id);
        return view('actividades.interno',['activity' => $activity]);
    }
    
    public function interno(Request $request, $id){
        $activity = \App\Activity::findOrFail($id);         
               
        $activity->alta = $request->alta;        
        $activity->media = $request->media;        
        $activity->baja = $request->baja;        
        $activity->muy_bueno = $request->muy_bueno;        
        $activity->bueno = $request->bueno;        
        $activity->deficiente = $request->deficiente;        
        $activity->muy_deficiente = $request->muy_deficiente;
        $valor = (($activity->alta + $activity->media + $activity->baja) * ($activity->muy_bueno + $activity->bueno + $activity->deficiente + $activity->muy_deficiente));
                
        $activity->valor = $valor;
        if ($activity->save()){

            return redirect()->route('factores-internos');
        } else {
            return back();
        }

    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/home');
        $activity = \App\Activity::findOrFail($request->id);
        $activity->nombre = $request->nombre;
        $activity->area_id = $request->area_id;
        $activity->save();
    }
    
    public function destroy($id){
        \App\Activity::findOrFail($id)->delete();
        
    }

    public function fortalezas(){
        $activities = Activity::all();
        return $activities;
    }
}
