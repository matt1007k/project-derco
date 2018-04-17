@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h2>Evaluando Oportunidades y Amenazas</h2>
                    </div>                  
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-responsive-sm">
                        <tbody>
                            <tr class="text-bold text-center text-white">
                                <td  class="bg-primary align-middle">Tabla de Evaluación</td>
                                <td colspan="3" class="bg-primary align-middle">Probabilidad de Ocurrencia</td>
                                <td colspan="4" class="bg-primary align-middle">Impacto a nuestro negocio</td>
                                <td rowspan="2" class="bg-danger align-middle">Valor ponderado del factor</td>
                            </tr>
                            <tr class="text-bold text-center">
                                <td class="align-middle">Factores Externos</td>
                                <td >Alta (3)</td>
                                <td >Media (2)</td>
                                <td >Baja (1)</td>
                                <td >Muy positivo (+2)</td>
                                <td >Positivo (+1)</td>
                                <td >Negativo (-1)</td>
                                <td >Muy Negativo (-2)</td>
                            </tr>
                            {{-- 
                            @foreach ($areas as $area) 
                                <tr class="bg-dark text-white">
                                    <td class="text-bold">{{$area->nombre}}</td>
                                    <td colspan="8"></td>
                                </tr>
                                @foreach ($area->activities as $activity)
                                    <tr>
                                        <td>{{$activity->nombre}} </td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">2</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            --}}
                        </tbody>
                    </table>              
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-danger text-bold">Amenazas Valor Ponderado < 0</h3>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-info text-bold">Oportunidades: Valor Ponderado > 0</h3>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        (function(){
            console.log('Hola');
            
        })()
    </script>
@endsection