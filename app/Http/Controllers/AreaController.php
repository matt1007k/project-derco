<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    

    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/home');
        $areas = Area::all();
        return $areas;
    }

    public function create(){
        return view('areas.create');
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/home');
        $area = new Area();
        $area->nombre = $request->nombre;
        $area->save();
    }

    
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/home');
        $area = Area::findOrFail($request->id);
        $area->nombre = $request->nombre;
        $area->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$request->ajax()) return redirect('/home');
        $area = Area::findOrFail($request->id);
        $area->delete();
    }
}
