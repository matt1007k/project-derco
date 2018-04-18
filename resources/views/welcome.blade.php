@extends('layouts.app')
@section('content')
<div class="derco-landing" style="background-image: url({{asset('img/derco-landing.jpg')}})">
    <div class="derco-list"> 
        <div class="container">
        <div class="row" >
                <ul class="landing-list">
                        <li class="landing-list-item"><a href="{{route('mision.vision')}} "><h4>Misión y Visión</h4> </a></li>
                        <li class="landing-list-item"><a href="{{route('valores')}} "><h4>Valores</h4></a></li>
                        <ul class="landing-list">
                            <li class="landing-list-item"><a href="#"><h4>Organigrama</h4></a></li>
                            <li class="landing-list-item"><a href="{{route('home')}}"><h4>Cadena de Valor</h4></a></li>
                            <li class="landing-list-item"><a href="#"><h4>Macroproceso</h4></a></li>
                            <ul class="landing-list">
                                <li class="landing-list-item"><h4>Análisis FODA</h4></li>
                                <li class="landing-list-item"><a href="{{route('factores-internos')}} "><h4>Fortalezas y Debilidades</h4></a></li>
                                <li class="landing-list-item"><a href="{{route('factores-externos')}} "><h4>Oportunidades y Amenazas</h4></a></li>
                                <ul class="landing-list">
                                        <li class="landing-list-item"><a href="#"><h4>Matriz FODA</h4></a></li>
                                        <li class="landing-list-item"><a href="#"><h4>Mapa</h4></a></li>
                                        <li class="landing-list-item"><a href="#"><h4>Maestro</h4></a></li>
                                        <li class="landing-list-item"><a href="#"><h4>Perpectivas</h4></a></li>
                                </ul>
                            </ul>
                        </ul>
                        
                    </ul>
        </div>
        </div>
    </div>
</div>
@endsection
        

            