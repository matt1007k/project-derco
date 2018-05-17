@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('objetivos')}} ">Objetivos y Estrategias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrar Objetivos</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">                                       
                  <h2>Asignar Estrategia</h2>             
                </div>
                
                <div class="card-body">
                        {!! Form::model($objetivo,['route' => ['objetivos.asignar', $objetivo->id], 'method' => 'PUT']) !!}                   
                        <div class="form-group row">                                
                            {{ Form::label('nombre', 'Claves de exitó', ['class' => 'col-3 col-form-label']) }}
                            <div class="col-9">
                                {{ Form::textarea('nombre',null,['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese la objetivo', 'size' => '40x5' ]) }}
                            </div>
                        </div>
                        <div class="form-group row">                                
                            {{ Form::label('estrategias', 'Estrategias', ['class' => 'col-3 col-form-label']) }}
                            <div class="col-9">
                                <ul class="list-group">
                                @foreach ($estrategias as $estrategia)                                    
                                    <li class="list-group-item">
                                        <label>
                                            {{ Form::checkbox('estrategias[]', $estrategia->id)}} {{$estrategia->nombre}}
                                        </label>
                                    </li>
                                @endforeach
                                </ul>
                                {!! $estrategias->render() !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
                            <a href="{{route('objetivos')}} " class="btn btn-danger pull-rigth">Cancelar</a>               
                            
                        </div>
                    {!! Form::close() !!}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection