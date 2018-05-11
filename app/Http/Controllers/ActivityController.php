<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Fortaleza;
use App\Debilidad;



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
    // Matriz FODA 
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
            $fortaleza = Fortaleza::where('activity_id', $activity->id)->first();
            $debilidad = Debilidad::where('activity_id', $activity->id)->first();

            if($fortaleza){
                if($activity->valor < 0){
                    $numero = 1;
                    $fortaleza->delete();
                    // Actualizamos el slug en orden ascendente
                    $slugUpdate = Fortaleza::all();
                    if (count($slugUpdate) > 0){
                        foreach ($slugUpdate as $key => $value) {
                            $value->slug = 'F'.$numero++;
                            $value->save();
                        }
                    }
                    // Copiamos a las debilidades
                    $length = Debilidad::all();
                    $debilidad = new Debilidad();
                    $debilidad->nombre = $activity->nombre;
                    $debilidad->slug = 'D'.($length->count() + 1);
                    $debilidad->activity_id = $fortaleza->activity_id;
                    $debilidad->save();
                }else{
                    /*$slug = substr($fortaleza->slug, 1);
                    //$slug = explode(" ",$total);
                    //dd($slug);
                    $total = 0;
                    $slug = 0;
                    $fortaleza = Fortaleza::all();
                    for ($i=0; $i < count($fortaleza); $i++) { 
                        $total .= $fortaleza[$i]['slug'];
                        $number = str_split($total, 1);
                        if (($number % 2) == 0)
                        {

                            dd($number);
                        }
                    }*/
                    return redirect()->route('factores-internos')->with('info', 'Evaluación no ha sido modificada');
                }
            }else if($debilidad){
                if($activity->valor > 0){
                    $numero = 1;
                    $debilidad->delete();
                    // Actualizamos el slug en orden ascendente
                    $slugUpdate = Debilidad::all();
                    if(count($slugUpdate) > 0) {
                        foreach ($slugUpdate as $key => $value) {
                            $value->slug = 'F'.$numero++;
                            $value->save();
                        }
                    }
                    // Copiamos a las fortalezas
                    $length = Fortaleza::all();                    
                    $fortaleza = new Fortaleza();
                    $fortaleza->nombre = $activity->nombre;
                    $fortaleza->slug = 'F'.($length->count() + 1);
                    $fortaleza->activity_id = $debilidad->activity_id;
                    $fortaleza->save();
                }else{
                    return redirect()->route('factores-internos')->with('info', 'Evaluación no ha sido modificada');
                    
                }
            } else {
                if($activity->valor > 0){
                    $length = Fortaleza::all();
                    $fortaleza = new Fortaleza();
                    $fortaleza->nombre = $activity->nombre;
                    $fortaleza->slug = 'F'.($length->count() + 1);
                    $fortaleza->activity_id = $activity->id;
                    $fortaleza->save();
                }else if ($activity->valor < 0){
                    
                    $length = Debilidad::all();
                    $debilidad = new Debilidad();
                    $debilidad->nombre = $activity->nombre;
                    $debilidad->slug = 'D'.($length->count() + 1);
                    $debilidad->activity_id = $activity->id;
                    $debilidad->save();
                    
                }
            }             
            
              
            return redirect()->route('factores-internos')->with('info', 'Evaluación realizada correctamente');
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
        $fortalezas = Fortaleza::all();
        return $fortalezas;
    }
    public function debilidades(){
        $debilidades = Debilidad::all();
        return $debilidades;
    }
}
