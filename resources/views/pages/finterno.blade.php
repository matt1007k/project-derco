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
                                <td rowspan="2" class="bg-warning align-middle">Actualizar</td>
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
                                    <td colspan="9"></td>
                                </tr>
                                @foreach ($area->activities as $activity)
                                    <tr>
                                        <td>{{$activity->nombre}} </td>
                                        
                                            <td class="align-middle text-center">
                                                @if ($activity->alta > 0)                                                    
                                                    {{$activity->alta}}
                                                @endif

                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($activity->media > 0)
                                                    {{$activity->media}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center"> 
                                                @if ($activity->baja > 0)                                                   
                                                    {{$activity->baja}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($activity->muy_bueno > 0)
                                                    {{$activity->muy_bueno}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($activity->bueno > 0)
                                                    {{$activity->bueno}} 
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($activity->deficiente < 0)
                                                    {{$activity->deficiente}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($activity->muy_deficiente < 0)
                                                    {{$activity->muy_deficiente}} 
                                                @endif
                                            </td>
                                        
                                        <td class="align-middle text-center bg-danger text-white" >
                                            <strong>{{$activity->valor}} </strong>
                                            
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{url('/actividad-interno/'.$activity->id)}}" class="btn btn-warning">
                                                <i class="fa fa-refresh"></i>
                                            </a>
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

