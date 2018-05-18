<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objetivo;
use App\Estrategia;
use App\Mapa;

class ObjetivosController extends Controller
{
       
    public function edit($id, $estrategia_id){
        $objetivo = Objetivo::findOrFail($id);
        $mapas = Mapa::pluck('nombre','id');
        return view('objetivos.edit',['mapas' => $mapas,'objetivo' => $objetivo, 'estrategia_id' => $estrategia_id]);
    }

    public function asignarEstrategias($objetivo_id){
        $objetivo = Objetivo::findOrFail($objetivo_id);
        $mapas = Mapa::pluck('nombre','id');
        $estrategias = Estrategia::paginate(10);
        return view('objetivos.asignarEstrategia',[
            'estrategias' => $estrategias,
            'objetivo' => $objetivo,
            'mapas' => $mapas
        ]);
    }

    public function asignar(Request $request, $id){
        $objetivo = Objetivo::findOrFail($id);
        $objetivo->nombre = $request->nombre;

        if($objetivo->mapa_id != $request->mapa_id){            
            $objetivo->mapa_id = $request->mapa_id;
            $mapa = Mapa::findOrFail($request->mapa_id);
            
            // Obtenemos las 2 primeras letras  
                    
            $primera_letra = substr($mapa->slug, 0, 1);
            
            $length = Objetivo::where('mapa_id',$mapa->id)->get();        
            $objetivo->slug = $primera_letra.($length->count() + 1);


        }
       
        foreach($request->estrategias as $estrategia){
            $estrategia_find = Estrategia::findOrFail($estrategia);
            $estrategia_find->objetivo_id = $id;
            $estrategia_find->save();
            //$estrategia_find->update('objetivo_id', $id);
        }
        if ($objetivo->save()){
            $numero = 1;
            $mapa = Mapa::findOrFail($request->mapa_id);

            // Obtenemos la primera letra                      
            $primera_letra = substr($mapa->slug, 0, 1);
            $length = Objetivo::where('mapa_id',$mapa->id)->get();
            if(count($length) > 0) {
                foreach ($length as $key => $value) {
                    $value->slug = $primera_letra.$numero++;
                    $value->save();
                }
            }
            return redirect()->route('objetivos')
                ->with('info', 'Estrategias asignadas con exitó');
        }
    }

    public function create(){
        $mapas = Mapa::pluck('nombre','id');
        return view('objetivos.create',['mapas' => $mapas]);
    }
    
    public function store(Request $request)
    {
        $objetivo = new Objetivo();
        $objetivo->nombre = $request->nombre;
        $objetivo->mapa_id = $request->mapa_id;
        // Obtenemos las 2 primeras letras  
        $mapa = Mapa::findOrFail($request->mapa_id);     
        $primera_letra = substr($mapa->slug, 0, 1);
        
        $length = Objetivo::where('mapa_id',$mapa->id)->get();        
        $objetivo->slug = $primera_letra.($length->count() + 1);

        $objetivo->save();
        
        return redirect()->route('objetivos')
                ->with('info', 'Objetivo registrado con exitó');
    }

    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objetivo = Objetivo::findOrFail($id);
        $objetivo->nombre = $request->nombre;
        $objetivo->estrategia_id = $request->estrategia_id;
        $objetivo->mapa_id = $request->mapa_id;
        $objetivo->save();

        return redirect()->route('objetivos')
                ->with('info', 'Objetivo actualizado con exitó');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        $objetivo->delete();

        return redirect()->route('objetivos')
                ->with('info', 'Objetivo eliminado con exitó');
    }
}
