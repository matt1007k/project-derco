@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}} ">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Matriz FODA</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Matriz FODA</h2>                            
                        </div>
                    </div>                  
                </div>

                <div class="card-body ">
                    <foda></foda>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection