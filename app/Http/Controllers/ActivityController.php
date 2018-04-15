<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ActivityController extends Controller
{

    public function new($area_id){
        $area_id = $area_id;
        return view('actividades.create', ['area_id' => $area_id]);
    }
    public function edit($id){
        $activity = \App\Activity::find($id);
        return view('actividades.edit', ['activity' => $activity]);
    }
    public function store(Request $request){
        if (!$request->ajax()) return redirect('/home');
        $activity = new \App\Activity();
        $activity->nombre = $request->nombre;
        $activity->area_id = $request->area_id;
        $activity->save();
    }
    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/home');
        $activity = \App\Activity::findOrFail($request->id);
        $activity->nombre = $request->nombre;
        $activity->area_id = $request->area_id;
        $activity->save();
    }
    
    public function destroy($id){
        \App\Activity::findOrFail($id)->delete();
        
    }
}
