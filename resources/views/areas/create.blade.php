@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}} ">Cadena de valor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrar nueva área</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">                                       
                  <h2>Registrar área</h2>             
                </div>

                <div class="card-body">
                    <form-area :edit="1"></form-area>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection