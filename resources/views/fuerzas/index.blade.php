@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h2>Fuerzas de M. Porter</h2>
                        </div>  
                        <div class="col-md-2">
                            <a href="{{route('fuerzas.create')}} " class="btn btn-secondary">Nuevo Fuerza</a>
                        </div>  
                    </div>                  
                </div>

                <div class="card-body">
                    
                    <div class="row card">
                    @if (count($fuerzas) > 0)
                    <br>
                        @foreach ($fuerzas as $fuerza)
                        <div class="col-md-12">
                            <div class="row ">
                                <div class="col-md-10 bg-dark">  
                                    <h3 class="text-white">{{ $fuerza->nombre }}</h3>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('claves.create', $fuerza->id)}} " class="btn btn-success btn-sm btn-block">Nueva clave</a>
                                </div> 
                            </div>
                            @foreach ($fuerza->keys as $clave)
                            <div class="row" id="fila{{$clave->id}}">
                                
                                <div class="col-md-10">
                                    <p>{{$clave->nombre}}</p>
                                    <hr>
                                </div>
                                <div class="col-md-2">                                    
                                    <a href="{{route('claves.edit',$clave->id)}} " class="btn btn-info btn-sm">Editar</a>
                                    <delete-object modelo="claves" :modelo_id="{{$clave->id}} "></delete-object>
                                </div>                                   
                                
                                
                            </div>
                                @endforeach
                            
                        </div>
                        <!--
                        <div class="col-md-12">
                            <cadena-valor :fuerza_id="{{$fuerza->id}}" v-if=""></cadena-valor>
                        </div>-->
                        
                        
                        
                        @endforeach
                    @else
                        <h4 class="text-bold">No hay ningún registro!!!</h4>
                    @endif
                    </div>                    
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
