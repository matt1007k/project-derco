@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('mision.vision')}} ">Misión y visión</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar visión</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">                                       
                    <h2>Editar Visión</h2>             
                </div>
                
                <div class="card-body">
                    {!! Form::model($vision,['route' => ['visions.update', $vision->id], 'method' => 'PUT']) !!}                        
                        @include('vision.form')
                    {!! Form::close() !!}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection