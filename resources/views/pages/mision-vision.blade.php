@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}} ">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Misión y Visión de la empresa</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h2>Misión y Visión</h2>
                    </div>                  
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h3 class="text-bold">Misión</h3>
                            @guest
                                <p class="text-justify">"{{$mission->nombre}}"</p>
                            @else
                                <p class="text-justify">"{{$mission->nombre}}"</p>
                                <a href="{{route('missions.edit', $mission->id)}}" class="btn btn-primary">Editar</a>
                            @endguest
                            
                            
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <h3 class="text-bold">Visión</h3>
                            @guest
                                <p class="text-justify">"{{$vision->nombre}}"</p>
                            @else
                                <p class="text-justify">"{{$vision->nombre}}"</p>
                                <a href="{{route('visions.edit', $vision->id)}}" class="btn btn-primary">Editar</a>
                            @endguest
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

