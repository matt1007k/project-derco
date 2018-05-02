@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}} ">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Factores Claves de Exitó vs Capacidad Desempeño</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Factores Claves de Exitó vs Capacidad de Desempeño</h2>                            
                        </div>
                    </div>                  
                </div>

                <div class="card-body ">
                    @if (count($activities) > 0)
                        <table class="table table-bordered table-responsive-sm">
                            <tbody>
                                <tr class="text-bold text-center text-white">
                                    
                                    <td  class="bg-primary align-middle">TABLA DE EVALUACIÓN</td>
                                    <td colspan="2" class="bg-primary align-middle">INFERIOR</td>
                                    <td colspan="2" class="bg-primary align-middle">IGUAL</td>
                                    <td colspan="2" class="bg-primary align-middle">SUPERIOR</td>                                   
                                    
                                </tr>
                                <tr class="text-bold text-center">
                                    <td class="align-middle">FACTORES</td>
                                    <td class="bg-danger align-middle text-white">FCE</td>
                                    <td class="bg-danger align-middle text-white">CAPACIDADES</td>
                                    <td class="bg-primary align-middle text-white">FCE</td>
                                    <td class="bg-primary align-middle text-white">CAPACIDADES</td>
                                    <td class="bg-success align-middle text-white">FCE</td>
                                    <td class="bg-success align-middle text-white">CAPACIDADES</td>                                                                   
                                </tr>
                                @foreach ($activities as $activity) 
                                                                        
                                    <tr>
                                        <td>{{$activity->nombre}} </td>
                                        
                                        <td class="align-middle text-center text-blue text-bold">
                                            @if ($activity->alta == 3)                                                    
                                                <span>ALTA</span>
                                            @endif

                                        </td>
                                        <td class="align-middle text-center text-blue text-bold">
                                            @if ($activity->bueno == 2)
                                                <span>BUENA</span>
                                            @endif
                                        </td>                                      
                                        <td class="align-middle text-center text-blue text-bold">
                                            @if ($activity->media == 2)
                                                <span>BUENA</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-blue text-bold">
                                            @if ($activity->bueno > 0)
                                                {{$activity->bueno}} 
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-blue text-bold bg-red-light">
                                            @if ($activity->deficiente < 0)
                                                {{$activity->deficiente}}
                                            @endif
                                        </td>                                       
                                    
                                        <td class="align-middle text-center bg-red-light" >
                                            @if ($activity->valor < 0)                                                    
                                                <strong class="text-red">{{$activity->valor}} </strong>
                                            @elseif ($activity->valor > 0)
                                                
                                            @endif
                                        </td>
                                        @guest
                                        @else
                                        
                                        @endguest
                                        
                                    </tr>
                                   
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
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection