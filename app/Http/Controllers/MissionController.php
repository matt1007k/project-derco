<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mission;

class MissionController extends Controller
{
    public function create(){
        return view('mision.create');
    }

    public function store(Request $request){
        $mission = new \App\mission();
        $mission->nombre = $request->nombre;
        if ($mission->save()){
            return redirect()->route('mision.vision')
                ->with('info', 'Misión registrada con exitó');
        }else{
            return back();
        }
    }

    public function edit($id){
        $mission = mission::findOrFail($id);
        return view('mision.edit',['mission' => $mission]);
    }

    public function update(Request $request, $id){
        $mission = mission::findOrFail($id);
        $mission->nombre = $request->nombre;
        if ($mission->save()){
            return redirect()->route('mision.vision')
            ->with('info', 'Misión editada con exitó');
        }else{
            return back();
        }
    }

    public function destroy($id){
        $mission = mission::findOrFail($id);
        
        if ($mission->delete()){
            return redirect()->route('mision.mission')
                ->with('info', 'Misión eliminada con exitó');
        }else{
            return back();
        }
    }
}
