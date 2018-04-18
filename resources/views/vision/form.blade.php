<div class="form-group row">                                
    {{ Form::label('nombre', 'Visión', ['class' => 'col-2 col-form-label']) }}
    <div class="col-10">
        {{ Form::textarea('nombre',null,['class' => 'form-control', 'id' => 'nombre']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::submit('Editar', ['class' => 'btn btn-primary']) }}
    <a href="{{route('mision.vision')}} " class="btn btn-danger pull-rigth">Cancelar</a>               
    
</div>