@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">        
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('factores-internos')}} ">Factores Internos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Editar evaluación de factores internos</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">                                       
                      <h2>Editar evaluación de factores internos</h2>             
                    </div>
                    
                    <div class="card-body">
                        <h3 class="text-bold text-center">{{$activity->nombre}}</h3>
                        {!! Form::model($activity,['route' => ['actividad-interno', $activity->id], 'method' => 'PUT']) !!}
                            <h4>Importancia de éxito</h4>
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
                            <h4>Desempeño de la empresa</h4>
                            <div class="form-group row">
                                {{ Form::label('muy_bueno', 'Muy Bueno (2)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('muy_bueno',null,['class' => 'form-control', 'id' => 'muy_bueno']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('bueno', 'Bueno (1)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('bueno',null,['class' => 'form-control', 'id' => 'bueno']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('deficiente', 'Deficiente (-1)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('deficiente',null,['class' => 'form-control', 'id' => 'deficiente']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('muy_deficiente', 'Muy Deficiente (-2)', ['class' => 'col-2 col-form-label']) }}
                                <div class="col-10">
                                    {{ Form::number('muy_deficiente',null,['class' => 'form-control', 'id' => 'muy_deficiente']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Editar', ['class' => 'btn btn-primary']) }}
                                <a href="{{route('factores-internos')}} " class="btn btn-danger pull-rigth">Cancelar</a>               
                                
                            </div>
                        {!! Form::close() !!}
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection