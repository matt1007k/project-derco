<div class="form-group row">                                
    {{ Form::label('nombre', 'Fuerzas de M. Porter', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('nombre',null,['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese la fuerza']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
    <a href="{{route('fuerzas.index')}} " class="btn btn-danger pull-rigth">Cancelar</a>               
    
</div>