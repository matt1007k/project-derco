@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}} ">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Objetivos</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9 col-xs-9">
                            <h2 class="text-center">Objetivos</h2>                            
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <a href="{{route('objetivos.create')}}" class="btn btn-dark">Nuevo Objetivo</a>
                        </div>
                    </div>                  
                </div>

                <div class="card-body ">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="text-center">Objetivos y estratégias</h3>
                            <table class="table table-responsive full-width">
                                <tr class="text-center">
                                    <th colspan="2">Objetivos</th>
                                    <th>Estrategias</th>
                                    <th>Acción</th>
                                </tr>
                                @foreach ($objetivos as $objetivo)
                                   
                                    <tr>
                                        <td>{{$objetivo->slug}}</td>
                                        <td>{{$objetivo->nombre}}</td>
                                        @if(count($objetivo->estrategias) > 0)
                                            <td>                                                                                                            
                                                @foreach ($objetivo->estrategias as $estrategia)
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-0">{{$estrategia->nombre}}</p>
                                                    </div>
                                                @endforeach                                                
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{route('asignar.estrategias',$objetivo->id)}}" class="btn btn-success">Asignar Estrategias</a> 
                                            </td>   
                                        @endif
                                        <td>
                                            @if(count($objetivo->estrategias) > 0)   
                                                <a href="{{route('asignar.estrategias',$objetivo->id)}}" class="btn btn-primary">Editar objetivo</a>
                                            @endif
                                        </td>
                                    </tr>
                                   
                                @endforeach
                                
                            </table>
                            
                        </div>
                        
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xs-12 ">
                            {!! $objetivos->render() !!}
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection