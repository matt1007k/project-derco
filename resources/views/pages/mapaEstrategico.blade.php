@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}} ">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mapa Estratégico</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Mapa Estratégico</h2>                            
                        </div>
                    </div>                  
                </div>

                <div class="card-body ">
                    <table class="table table-responsive">
                        @foreach ($mapas as $mapa)
                            <tr >
                                <td style="height: 100%;" class="text-center">
                                    <div class="alert alert-danger " style="height: 100%;" role="alert">
                                        <h4 class="alert-heading">{{$mapa->nombre}}</h4>                                                
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach ($mapa->objetivos as $objetivo)
                                        <div class="col-md-4">
                                            <div class="alert alert-primary" role="alert">
                                                F1-{{$objetivo->nombre}}                                                 
                                            </div>
                                        </div>
                                        @endforeach  
                                    </div>
                                </td>
                            </tr> 
                        @endforeach
                        
                        
                        
                    </table>
                              
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection