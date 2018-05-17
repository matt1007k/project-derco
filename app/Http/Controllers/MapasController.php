<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapa;

class MapasController extends Controller
{
    public function store(Request $request)
    {
        $mapa = new Mapa();
        $mapa->nombre = $request->nombre;
        $mapa->save();
        
        return redirect()->route('mapa-estrategico')
                ->with('info', 'Mapa registrado con exitó');
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
        $mapa->nombre = $request->nombre;
        $mapa->save();

        return redirect()->route('mapa-estrategico')
                ->with('info', 'mapa actualizado con exitó');
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

        return redirect()->route('mapa-estrategico')
                ->with('info', 'mapa eliminado con exitó');
    }
}
