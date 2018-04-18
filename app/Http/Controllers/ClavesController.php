<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Key;

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
    
    public function externo(Request $request, $id){
        $clave = Key::findOrFail($id);         
               
        $clave->alta = $request->alta;        
        $clave->media = $request->media;        
        $clave->baja = $request->baja;        
        $clave->muy_positivo = $request->muy_postivo;        
        $clave->positivo = $request->positivo;        
        $clave->negativo = $request->negativo;        
        $clave->muy_negativo = $request->muy_negativo;
        $valor = (($clave->alta + $clave->media + $clave->baja) * ($clave->muy_postivo + $clave->positivo + $clave->negativo + $clave->muy_negativo));
                
        $clave->valor = $valor;
        if ($clave->save()){
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
}
