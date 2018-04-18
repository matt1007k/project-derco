<div class="form-group row">                                
    {{ Form::label('nombre', 'Valor de la org.', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('nombre',null,['class' => 'form-control', 'id' => 'nombre']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
    <a href="{{route('valores')}} " class="btn btn-danger pull-rigth">Cancelar</a>               
    
</div>