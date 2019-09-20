{{$Modo=='crear'?'Agregar Categoria':'Modificar Categoria'}}
<div class="form-group">
    <label for="nombre" class="control-label">{{'nombre'}}</label>
    <input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" id="nombre"
        value="{{isset($categoria->nombre)?$categoria->nombre:old('Nombre')}}">
    {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="detalle" class="control-label">{{'Detalle'}}</label>
    <input class="form-control {{$errors->has('detalle')?'is-invalid':''}}" type="text" name="detalle" id="detalle"
        value="{{isset($categoria->detalle)?$categoria->detalle:old('detalle')}}">
    {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
</div>
<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('empresas')}}">Regresar </a>