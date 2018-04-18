@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('fuerzas.index')}} ">Fuerzas de porter</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar clave de exitó</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">                                       
                    <h2>Editar clave de exitó</h2>             
                </div>
                
                <div class="card-body">
                    {!! Form::model($clave,['route' => ['claves.update', $clave->id], 'method' => 'PUT']) !!}                        
                        @include('claves.form')
                    {!! Form::close() !!}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection