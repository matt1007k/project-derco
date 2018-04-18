@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('mision.vision')}} ">Misión y visión</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar misión</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">                                       
                    <h2>Editar Misión</h2>             
                </div>
                
                <div class="card-body">
                    {!! Form::model($mission,['route' => ['missions.update', $mission->id], 'method' => 'PUT']) !!}                        
                        @include('mision.form')
                    {!! Form::close() !!}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection