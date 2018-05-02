@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}} ">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Macroproceso</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Macroproceso</h2>                            
                        </div>
                    </div>                  
                </div>

                <div class="card-body ">
                    <div class="text-center">
                        <img src="{{asset('img/macroproceso.jpg')}}" class="img-fluid" alt="Macroproceso Derco">                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection