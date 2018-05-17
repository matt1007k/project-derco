<div class="form-group row">                                
    {{ Form::label('nombre', 'Claves de exitó', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::textarea('nombre',null,['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese la objetivo', 'size' => '40x5' ]) }}
    </div>
</div>
<div class="form-group row">                                
    {{ Form::label('mapa_id', 'Factor Estrategico', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
    {{ Form::select('mapa_id', $mapas, null, ['class' => 'form-control','placeholder' => 'Escoge...']) }}                                             
    </div>
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
    <a href="{{route('objetivos')}} " class="btn btn-danger pull-rigth">Cancelar</a>               
    
</div>