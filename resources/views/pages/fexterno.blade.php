@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}} ">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Oportunidades y Amenazas de la empresa</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h2>Evaluando Oportunidades y Amenazas</h2>
                    </div>                  
                </div>

                <div class="card-body">
                    @if (count($fuerzas) > 0)
                        <table class="table table-bordered table-responsive-sm">
                            <tbody>
                                <tr class="text-bold text-center text-white">
                                    <td  class="bg-primary align-middle">Tabla de Evaluación</td>
                                    <td colspan="3" class="bg-primary align-middle">Probabilidad de Ocurrencia</td>
                                    <td colspan="4" class="bg-primary align-middle">Impacto a nuestro negocio</td>
                                    <td rowspan="2" class="bg-red-light align-middle">Valor ponderado <br>del factor</td>
                                    @guest
                                    
                                    @else
                                    <td rowspan="2" class="bg-secondary align-middle">Actualizar</td>
                                    @endguest
                                </tr>
                                <tr class="text-bold text-center">
                                    <td class="align-middle">Factores Externos</td>
                                    <td >Alta (3)</td>
                                    <td >Media (2)</td>
                                    <td >Baja (1)</td>
                                    <td >Muy positivo (+2)</td>
                                    <td >Positivo (+1)</td>
                                    <td >Negativo (-1)</td>
                                    <td >Muy Negativo (-2)</td>
                                </tr>
                                @foreach ($fuerzas as $fuerza) 
                                    <tr class="bg-dark text-white">
                                        <td class="text-bold">{{$fuerza->nombre}}</td>
                                        <td colspan="9"></td>
                                    </tr>
                                    @foreach ($fuerza->keys as $clave)
                                        <tr>
                                            <td>{{$clave->nombre}} </td>
                                            
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($clave->alta > 0)                                                    
                                                    {{$clave->alta}}
                                                @endif

                                            </td>
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($clave->media > 0)
                                                    {{$clave->media}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-blue text-bold"> 
                                                @if ($clave->baja > 0)                                                   
                                                    {{$clave->baja}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($clave->muy_positivo > 0)
                                                    {{$clave->muy_positivo}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($clave->positivo > 0)
                                                    {{$clave->positivo}} 
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($clave->negativo < 0)
                                                    {{$clave->negativo}}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-blue text-bold">
                                                @if ($clave->muy_negativo < 0)
                                                    {{$clave->muy_negativo}} 
                                                @endif
                                            </td>
                                            
                                            <td class="align-middle text-center bg-red-light" >
                                                @if ($clave->valor < 0)                                                    
                                                    <strong class="text-red">{{$clave->valor}} </strong>
                                                @elseif ($clave->valor > 0)
                                                    <strong class="text-blue">{{$clave->valor}} </strong>
                                                @endif
                                                
                                            </td>
                                            @guest
                                            @else
                                            <td class="align-middle text-center">
                                                <a href="{{url('/actividad-externo/'.$clave->id)}}" class="btn btn-primary">
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
                            <h3 class="text-danger text-bold">Amenazas Valor Ponderado < 0</h3>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-info text-bold">Oportunidades: Valor Ponderado > 0</h3>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        (function(){
            console.log('Hola');
            
        })()
    </script>
@endsection