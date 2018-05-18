<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapa;

class MapasController extends Controller
{
    public function create(){
        return view('mapas.create');
    }

    public function store(Request $request)
    {
        $mapa = new Mapa(); 
        // Obtenemos las 2 primeras letras       
        $dos_letras = substr($request->nombre, 0, 2);
        // Convertimos en mayusculas  
        $slug = strtoupper($dos_letras); 

        $mapa->nombre = $request->nombre;
        $mapa->slug = $slug;
        $mapa->save();
        
        return redirect()->route('objetivos.create')
                ->with('info', 'Categoria registrado con exitó');
        
        
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
        $mapa = mapa::findOrFail($id);
        // Obtenemos las 2 primeras letras       
        $dos_letras = substr($request->nombre, 0, 2);
        // Convertimos en mayusculas  
        $slug = strtoupper($dos_letras); 

        $mapa->nombre = $request->nombre;
        $mapa->slug = $slug;
        $mapa->save();

        return redirect()->route('objetivos.create')
                ->with('info', 'Categoria actualizado con exitó');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapa = mapa::findOrFail($id);
        $mapa->delete();

        return redirect()->route('objetivos.create')
                ->with('info', 'Categoria eliminado con exitó');
    }
}
