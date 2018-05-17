<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estrategia;

class EstrategiasController extends Controller
{

    public function estrategiaAll($tipo){
        $estrategia = Estrategia::where('tipo', $tipo)->get();

        return $estrategia;
    }
    
    
    public function store(Request $request)
    {
        $estrategia = new Estrategia();
        $estrategia->nombre = $request->nombre;
        $estrategia->foda = $request->foda;
        $estrategia->tipo = $request->tipo;
        $estrategia->objetivo_id = '1';
        $estrategia->save();
       
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
        $estrategia = Estrategia::findOrFail($id);
        $estrategia->nombre = $request->nombre;
        $estrategia->foda = $request->foda;
        
        $estrategia->save();

        return redirect()->route('matriz-foda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estrategia = Estrategia::findOrFail($id);
        $estrategia->delete();
    }
}
