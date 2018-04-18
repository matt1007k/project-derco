@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('fuerzas.index')}} ">Fuerza de porter</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Fuerza</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">                                       
                    <h2>Editar Fuerza</h2>             
                </div>
                
                <div class="card-body">
                    {!! Form::model($fuerza,['route' => ['fuerzas.update', $fuerza->id], 'method' => 'PUT']) !!}                        
                        @include('fuerzas.form')
                    {!! Form::close() !!}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection