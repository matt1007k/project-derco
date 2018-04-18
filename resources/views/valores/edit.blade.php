@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('valores')}} ">valor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar valor</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">                                       
                    <h2>Editar valor</h2>             
                </div>
                
                <div class="card-body">
                    {!! Form::model($valor,['route' => ['valores.update', $valor->id], 'method' => 'PUT']) !!}                        
                        @include('valores.form')
                    {!! Form::close() !!}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection