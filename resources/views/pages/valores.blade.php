@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}} ">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Valores de la empresa</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        @guest
                            <div class="col-md-12">
                                <h2>Valores de la organización</h2>
                            </div>
                        @else
                            <div class="col-md-10">
                                <h2>Valores de la organización</h2>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('valores.create')}}" class="btn btn-success">Nuevo valor</a>                           
                            </div>
                        @endguest
                    </div>                  
                </div>

                <div class="card-body">
                    @if (count($valores) > 0)
                        @foreach ($valores as $valor)
                            <div class="row" id="fila{{$valor->id}}">
                                @guest
                                    <div class="col-md-12"> 
                                        <ul class="list-group">
                                            <li class="list-group-item"><i class="fa fa-check"></i> {{$valor->nombre}}</li>                                    
                                        </ul>
                                        
                                    </div>
                                @else
                                    <div class="col-md-8"> 
                                        <ul class="list-group">
                                            <li class="list-group-item"><i class="fa fa-check"></i> {{$valor->nombre}}</li>                                    
                                        </ul>
                                        
                                    </div>
                                    <div class="col-md-4">  
                                        <a href="{{route('valores.edit', $valor->id)}}" class="btn btn-primary btn-sm">Editar</a>
                                        <delete-object modelo="valores" :modelo_id="{{$valor->id}} "></delete-object>
                                    </div>
                                @endguest
                            </div>
                        @endforeach
                    @else
                        <h3>No hay ningún registro</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

