<div class="form-group row">                                
    {{ Form::label('nombre', 'Nombre de categoria:', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('nombre',null,['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese el nombre']) }}        
    </div>
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
    <a href="{{route('objetivos.create')}} " class="btn btn-danger pull-rigth">Cancelar</a>               
    
</div>