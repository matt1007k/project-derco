<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Key;
use App\Oportunidad;
use App\Amenaza;

class ClavesController extends Controller
{
    
    public function create($id){
        $force_id = $id;
        return view('claves.create', ['force_id' => $force_id]);
    }

    public function store(Request $request){
        $clave = new \App\Key();
        $clave->force_id = $request->force_id;
        $clave->nombre = $request->nombre;
        $clave->alta = 0;        
        $clave->media = 0;        
        $clave->baja = 0;        
        $clave->muy_positivo = 0;        
        $clave->positivo = 0;        
        $clave->negativo = 0;        
        $clave->muy_negativo = 0;
        $clave->valor = 0;
        if ($clave->save()){
            return redirect()->route('fuerzas.index')
                ->with('info', 'El clave de exitó se registro correctamente');
        }else{
            return back();
        }
    }

    public function edit($id){
        $clave = Key::findOrFail($id);
        $force_id = $clave->force_id;
        return view('claves.edit',['clave' => $clave, 'force_id' => $force_id]);
    }

    public function update(Request $request, $id){
        $clave = Key::findOrFail($id);
        $clave->force_id = $request->force_id;
        $clave->nombre = $request->nombre;
        if ($clave->save()){
            return redirect()->route('fuerzas.index')
                ->with('info', 'El clave de exitó se editó correctamente');
        }else{
            return back();
        }
    }

    public function externoEdit($id){
        $clave = Key::findOrFail($id);
        return view('claves.externo',['clave' => $clave]);
    }
    // Matriz FODA 
    public function externo(Request $request, $id){
        $clave = Key::findOrFail($id);         
               
        $clave->alta = $request->alta;        
        $clave->media = $request->media;        
        $clave->baja = $request->baja;        
        $clave->muy_positivo = $request->muy_positivo;        
        $clave->positivo = $request->positivo;        
        $clave->negativo = $request->negativo;        
        $clave->muy_negativo = $request->muy_negativo;
        $valor = (($clave->alta + $clave->media + $clave->baja) * ($clave->muy_positivo + $clave->positivo + $clave->negativo + $clave->muy_negativo));
                
        $clave->valor = $valor;
        if ($clave->save()){

            $oportunidad = Oportunidad::where('key_id', $clave->id)->first();
            $amenaza = Amenaza::where('key_id', $clave->id)->first();

            if($oportunidad){
                if($clave->valor < 0){
                    $numero = 1;
                    $oportunidad->delete();
                    // Actualizamos el slug en orden ascendente
                    $slugUpdate = Oportunidad::all();
                    if (count($slugUpdate) > 0){
                        foreach ($slugUpdate as $key => $value) {
                            $value->slug = 'O'.$numero++;
                            $value->save();
                        }
                    }
                    // Copiamos a las amenazaes
                    $length = Amenaza::all();
                    $amenaza = new Amenaza();
                    $amenaza->nombre = $clave->nombre;
                    $amenaza->slug = 'A'.($length->count() + 1);
                    $amenaza->key_id = $oportunidad->key_id;
                    $amenaza->save();
                }else{
                    return redirect()->route('factores-externos')->with('info', 'Evaluación no ha sido modificada');
                }
            }else if($amenaza){
                if($clave->valor > 0){
                    $numero = 1;
                    $amenaza->delete();
                    // Actualizamos el slug en orden ascendente
                    $slugUpdate = Amenaza::all();
                    if(count($slugUpdate) > 0) {
                        foreach ($slugUpdate as $key => $value) {
                            $value->slug = 'A'.$numero++;
                            $value->save();
                        }
                    }
                    // Copiamos a las oportunidads
                    $length = Oportunidad::all();                    
                    $oportunidad = new Oportunidad();
                    $oportunidad->nombre = $clave->nombre;
                    $oportunidad->slug = 'O'.($length->count() + 1);
                    $oportunidad->key_id = $amenaza->key_id;
                    $oportunidad->save();
                }else{
                    return redirect()->route('factores-externos')->with('info', 'Evaluación no ha sido modificada');
                    
                }
            } else {
                if($clave->valor > 0){
                    $length = Oportunidad::all();
                    $oportunidad = new Oportunidad();
                    $oportunidad->nombre = $clave->nombre;
                    $oportunidad->slug = 'O'.($length->count() + 1);
                    $oportunidad->key_id = $clave->id;
                    $oportunidad->save();
                }else if ($clave->valor < 0){
                    
                    $length = Amenaza::all();
                    $amenaza = new Amenaza();
                    $amenaza->nombre = $clave->nombre;
                    $amenaza->slug = 'A'.($length->count() + 1);
                    $amenaza->key_id = $clave->id;
                    $amenaza->save();
                    
                }
            }  


            return redirect()->route('factores-externos') 
                    ->with('info', 'Evaluación actualizada');
        } else {
            return back();
        }

    }

    public function destroy($id){
        $clave = Key::findOrFail($id);        
        $clave->delete();
    }


    public function oportunidades(){
        $oportunidades = Oportunidad::all();
        return $oportunidades;
    }
    public function amenazas(){
        $amenazas = Amenaza::all();
        return $amenazas;
    }
    
}
