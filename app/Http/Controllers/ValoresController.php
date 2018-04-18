<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Value;

class ValoresController extends Controller
{
    public function create(){
        return view('valores.create');
    }

    public function store(Request $request){
        $valor = new Value();
        $valor->nombre = $request->nombre;
        if ($valor->save()){
            return redirect()->route('valores')
                ->with('info', 'Valor se ha registrado con exitó');
        }else{
            return back();
        }
    }

    public function edit($id){
        $valor = Value::findOrFail($id);
        return view('valores.edit',['valor' => $valor]);
    }

    public function update(Request $request, $id){
        $valor = Value::findOrFail($id);
        $valor->nombre = $request->nombre;
        if ($valor->save()){
            return redirect()->route('valores')
                ->with('info', 'Valor se ha editado con exitó');
        }else{
            return back();
        }
    }

    public function destroy($id){
        $valor = Value::findOrFail($id);
        
        $valor->delete();
    }

}
