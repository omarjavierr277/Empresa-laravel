{{$Modo=='crear'?'Agregar Empresa':'Modificar Empresa'}}
<div class="form-group">
    <label for="nombre" class="control-label">{{'nombre'}}</label>
    <input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" id="nombre"
        value="{{isset($empresa->nombre)?$empresa->nombre:old('Nombre')}}">
    {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
</div>
<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('empresas')}}">Regresar </a>