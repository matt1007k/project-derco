@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}} ">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Fortalezas y Debilidad de la empresa</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h2>Evaluando Fortalezas y Debilidad</h2>
                    </div>                  
                </div>

                <div class="card-body">
                    @if (count($areas) > 0)
                        <table class="table table-bordered table-responsive-sm">
                            <tbody>
                                <tr class="text-bold text-center text-white">
                                    @guest
                                    <td  class="bg-primary align-middle">Tabla de Evaluación</td>
                                    <td colspan="3" class="bg-primary align-middle">Importancia de éxito</td>
                                    <td colspan="4" class="bg-primary align-middle">Desempeño de la empresa</td>
                                    <td rowspan="2" class="bg-red-light align-middle">Valor ponderado <br>del factor</td>
                                    @else
                                        <td  class="bg-primary align-middle">Tabla de Evaluación</td>
                                        <td colspan="3" class="bg-primary align-middle">Importancia de éxito</td>
                                        <td colspan="4" class="bg-primary align-middle">Desempeño de la empresa</td>
                                        <td rowspan="2" class="bg-red-light align-middle">Valor ponderado <br>del factor</td>
                                        <td rowspan="2" class="bg-secondary align-middle">Actualizar</td>
                                    @endguest
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
                                            
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($activity->alta > 0)                                                    
                                                    {{$activity->alta}}
                                                @endif

                                            </td>
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($activity->media > 0)
                                                    {{$activity->media}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-blue text-bold"> 
                                                @if ($activity->baja > 0)                                                   
                                                    {{$activity->baja}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($activity->muy_bueno > 0)
                                                    {{$activity->muy_bueno}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($activity->bueno > 0)
                                                    {{$activity->bueno}} 
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($activity->deficiente < 0)
                                                    {{$activity->deficiente}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($activity->muy_deficiente < 0)
                                                    {{$activity->muy_deficiente}} 
                                                @endif
                                            </td>
                                        
                                            <td class="align-middle text-center bg-red-light" >
                                                @if ($activity->valor < 0)                                                    
                                                    <strong class="text-red">{{$activity->valor}} </strong>
                                                @elseif ($activity->valor > 0)
                                                    <strong class="text-blue">{{$activity->valor}} </strong>
                                                @endif
                                            </td>
                                            @guest
                                            @else
                                            <td class="align-middle text-center">
                                                <a href="{{url('/actividad-interno/'.$activity->id)}}" class="btn btn-primary">
                                                    <i class="fa fa-refresh"></i>
                                                </a>
                                            </td>
                                            @endguest
                                            
                                        </tr>
                                    @endforeach
                                @endforeach
                                
                            </tbody>
                        </table> 
                    @else
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="text-danger text-bold">No hay ningún registro!!!</h3>
                            </div>
                            
                        </div>   
                    @endif
                                 
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

