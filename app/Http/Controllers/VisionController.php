<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vision;

class VisionController extends Controller
{
    public function create(){
        return view('vision.create');
    }

    public function store(Request $request){
        $vision = new \App\Vision();
        $vision->nombre = $request->nombre;
        if ($vision->save()){
            return redirect()->route('mision.vision')
                ->with('info', 'Visión registrada con exitó');
        }else{
            return back();
        }
    }

    public function edit($id){
        $vision = Vision::findOrFail($id);
        return view('vision.edit',['vision' => $vision]);
    }

    public function update(Request $request, $id){
        $vision = Vision::findOrFail($id);
        $vision->nombre = $request->nombre;
        if ($vision->save()){
            return redirect()->route('mision.vision')
                ->with('info', 'Visión editada con exitó');
        }else{
            return back();
        }
    }

    public function destroy($id){
        $vision = Vision::findOrFail($id);
        
        if ($vision->delete()){
            return redirect()->route('mision.vision')
                 ->with('info', 'Visión eliminada con exitó');
        }else{
            return back();
        }
    }


}
