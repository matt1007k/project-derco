@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h2>Cadena de valor</h2>
                        </div>  
                        <div class="col-md-2">
                            <a href="{{route('areas.create')}} " class="btn btn-secondary">Nuevo área</a>
                        </div>  
                    </div>                  
                </div>

                <div class="card-body">
                    
                    <div class="row card">
                    @if (count($areas) > 0)
                    <br>
                        @foreach ($areas as $area)
                        <div class="col-md-12">
                            <div class="row ">
                                <div class="col-md-10 bg-dark">  
                                    <h3 class="text-white">{{ $area->nombre }}</h3>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('create-actividad', $area->id)}} " class="btn btn-success btn-sm btn-block">Nueva actividad</a>
                                </div> 
                            </div>
                            @foreach ($area->activities as $actividad)
                            <div class="row" id="fila{{$actividad->id}}">
                                
                                <div class="col-md-10">
                                    <p>{{$actividad->nombre}}</p>
                                    <hr>
                                </div>
                                <div class="col-md-2">                                    
                                    <a href="{{route('activities.edit',$actividad->id)}} " class="btn btn-info btn-sm">Editar</a>
                                    <delete-object modelo="activities" :modelo_id="{{$actividad->id}} "></delete-object>
                                </div>                                   
                                
                                
                            </div>
                                @endforeach
                            
                        </div>
                        <!--
                        <div class="col-md-12">
                            <cadena-valor :area_id="{{$area->id}}" v-if=""></cadena-valor>
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
