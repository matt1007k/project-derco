<div class="form-group row">                                
    {{ Form::label('nombre', 'Objetivo', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::textarea('nombre',null,['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese la objetivo', 'size' => '40x5' ]) }}
    </div>
</div>
<div class="form-group row">                                
    {{ Form::label('mapa_id', 'Categoria', ['class' => 'col-3 col-form-label']) }}
    <div class="col-6">
    {{ Form::select('mapa_id', $mapas, null, ['class' => 'form-control','placeholder' => 'Escoge...']) }}                                             
    </div>
    <div class="col-2">
        <a href="{{route('mapas.create')}}" class="btn btn-secondary btn-sm">Nueva categoria</a>
    </div>
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
    <a href="{{route('objetivos')}} " class="btn btn-danger pull-rigth">Cancelar</a>               
    
</div>