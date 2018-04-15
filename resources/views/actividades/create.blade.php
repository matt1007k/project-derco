@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}} ">Cadena de valor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrar nueva actividad</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">                                       
                  <h2>Registrar actividad</h2>             
                </div>
                
                <div class="card-body">
                    <form-actividad :edit="1" :area_id="{{$area_id}}"></form-actividad>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection