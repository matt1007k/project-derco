@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h2>Evaluando Fortalezas y Debilidad</h2>
                    </div>                  
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-responsive-sm">
                        <tbody>
                            <tr class="text-bold text-center text-white">
                                <td  class="bg-primary align-middle">Tabla de Evaluación</td>
                                <td colspan="3" class="bg-primary align-middle">Importancia de éxito</td>
                                <td colspan="4" class="bg-primary align-middle">Desempeño de la empresa</td>
                                <td rowspan="2" class="bg-danger align-middle">Valor ponderado del factor</td>
                            </tr>
                            <tr class="text-bold text-center">
                                <td class="align-middle">Factores Internos</td>
                                <td >Alta (3)</td>
                                <td >Media (2)</td>
                                <td >Baja (1)</td>
                                <td >Muy bueno (+2)</td>
                                <td >Bueno (+1)</td>
                                <td >Deficiente (-1)</td>
                                <td >Muy Deficiente (-2)</td>
                            </tr>
                            @foreach ($areas as $area) 
                                <tr class="bg-dark text-white">
                                    <td class="text-bold">{{$area->nombre}}</td>
                                    <td colspan="8"></td>
                                </tr>
                                @foreach ($area->activities as $activity)
                                    <tr>
                                        <td>{{$activity->nombre}} </td>
                                        
                                            <td class="align-middle text-center">
                                                @if ($activity->alta == 0)
                                                    {{$activity->alta}}
                                                @else
                                                    <input type="text" data-id="{{$activity->id}}" data-campo="alta"  name="actividad-alta" class="w-10 align-middle input-actividad" id="actividad-alta-{{$activity->id}}" value="{{$activity->alta}} ">            

                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <input type="text" data-id="{{$activity->id}}" data-campo="media"  name="actividad-media" class="w-10 align-middle input-actividad" id="actividad-media-{{$activity->id}}" value="{{$activity->media}} ">
                                            </td>
                                            <td class="align-middle text-center">                                                    
                                                <input type="text" data-id="{{$activity->id}}" data-campo="baja"  name="actividad-baja" class="w-10 align-middle input-actividad" id="actividad-baja-{{$activity->id}}" value="{{$activity->baja}} ">
                                                
                                            </td>
                                            <td class="align-middle text-center">
                                                <input type="text" data-id="{{$activity->id}}" data-campo="muy_bueno"  name="actividad-muy-bueno" class="w-10 align-middle input-actividad" id="actividad-muy_bueno-{{$activity->id}}" value="{{$activity->muy_bueno}} ">
                                            </td>
                                            <td class="align-middle text-center">
                                                <input type="text" data-id="{{$activity->id}}" data-campo="bueno"  name="actividad-bueno" class="w-10 align-middle input-actividad" id="actividad-bueno-{{$activity->id}}" value="{{$activity->bueno}} ">
                                            </td>
                                            <td class="align-middle text-center">
                                                <input type="text" data-id="{{$activity->id}}" data-campo="deficiente"  name="actividad-deficiente" class="w-10 align-middle input-actividad" id="actividad-deficiente-{{$activity->id}}" value="{{$activity->deficiente}} ">
                                            </td>
                                            <td class="align-middle text-center">
                                                <input type="text" data-id="{{$activity->id}}" data-campo="muy_deficiente"  name="actividad-muy-deficiente" class="w-10 align-middle input-actividad" id="actividad-muy_deficiente-{{$activity->id}}" value="{{$activity->muy_deficiente}} ">  
                                            </td>
                                        
                                        <td class="align-middle text-center bg-danger text-white" >
                                            <strong>{{$activity->valor}} </strong>
                                            
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            @endforeach
                            
                        </tbody>
                      </table>              
                        <div class="row">
                                <div class="col-md-6">
                                    <h3 class="text-danger text-bold">Debilidades: Valor Ponderado < 0</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="text-info text-bold">Fortalezas: Valor Ponderado > 0</h3>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

