<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Force;
use App\Key;

class FuerzasController extends Controller
{
    public function index(){
        $fuerzas = Force::all();
        return view('fuerzas.index',['fuerzas' => $fuerzas]);
    }

    public function create(){
        return view('fuerzas.create');
    }

    public function store(Request $request){
        $fuerza = new \App\Force();
        $fuerza->nombre = $request->nombre;
        if ($fuerza->save()){
            return redirect()->route('fuerzas.index')
                ->with('info', 'Fuerza registrada con exitó');
        }else{
            return back();
        }
    }

    public function edit($id){
        $fuerza = Force::findOrFail($id);
        return view('fuerzas.edit',['fuerza' => $fuerza]);
    }

    public function update(Request $request, $id){
        $fuerza = Force::findOrFail($id);
        $fuerza->nombre = $request->nombre;
        if ($fuerza->save()){
            return redirect()->route('fuerzas.index')
                ->with('info', 'Fuerza editada con exitó');
        }else{
            return back();
        }
    }

    public function destroy($id){
        $fuerza = Force::findOrFail($id);
        
        if ($fuerza->delete()){
            return redirect()->route('fuerzas.index')
                 ->with('info', 'Fuerza eliminada con exitó');
        }else{
            return back();
        }
    }
}
