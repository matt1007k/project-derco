<div class="form-group row">                                
    {{ Form::label('nombre', 'Claves de exitó', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('nombre',null,['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese la clave']) }}
        @if ($force_id)
        {{ Form::hidden('force_id',$force_id,['id' => 'force_id']) }}            
        @endif
    </div>
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
    <a href="{{route('fuerzas.index')}} " class="btn btn-danger pull-rigth">Cancelar</a>               
    
</div>