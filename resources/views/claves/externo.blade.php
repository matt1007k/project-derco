@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">        
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('factores-externos')}} ">Factores Externos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Editar evaluación de factores externos</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">                                       
                      <h2>Editar evaluación de factores externos</h2>             
                    </div>
                    
                    <div class="card-body">
                        <h3 class="text-bold text-center">{{$clave->nombre}}</h3>
                        {!! Form::model($clave,['route' => ['actividad-externo', $clave->id], 'method' => 'PUT']) !!}
                            <h4>Probabilidad de Ocurrencia</h4>
                            <div class="form-group row">                                
                                {{ Form::label('alta', 'Alta (3)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('alta',null,['class' => 'form-control', 'id' => 'alta']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('media', 'Media (2)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('media',null,['class' => 'form-control', 'id' => 'media']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('baja', 'Baja (1)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('baja',null,['class' => 'form-control', 'id' => 'baja']) }}
                                </div>
                            </div>
                            <h4>Impacto a nuestro negocio</h4>
                            <div class="form-group row">
                                {{ Form::label('muy_positivo', 'Muy Positivo (2)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('muy_positivo',null,['class' => 'form-control', 'id' => 'muy_positivo']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('positivo', 'Positivo (1)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('positivo',null,['class' => 'form-control', 'id' => 'positivo']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('negativo', 'Negativo (-1)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('negativo',null,['class' => 'form-control', 'id' => 'negativo']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('muy_negativo', 'Muy Negativo (-2)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('muy_negativo',null,['class' => 'form-control', 'id' => 'muy_negativo']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Editar', ['class' => 'btn btn-primary']) }}
                                <a href="{{route('factores-externos')}} " class="btn btn-danger pull-rigth">Cancelar</a>               
                                
                            </div>
                        {!! Form::close() !!}
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection