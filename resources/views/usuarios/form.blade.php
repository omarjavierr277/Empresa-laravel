{{$Modo=='crear'?'Agregar Usuario':'Modificar Usuario'}}
<div class="form-group">
    <label for="nombre" class="control-label">{{'nombre'}}</label>
    <input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" id="nombre"
        value="{{isset($usuario->nombre)?$usuario->nombre:old('Nombre')}}">
    {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="apellidos" class="control-label">{{'Apellidos'}}</label>
    <input class="form-control {{$errors->has('apellidos')?'is-invalid':''}}" type="text" name="apellidos" id="apellidos"
        value="{{isset($usuario->apellidos)?$usuario->apellidos:old('apellidos')}}">
    {!! $errors->first('apellidos','<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="correo" class="control-label">{{'Correo'}}</label>
    <input class="form-control {{$errors->has('correo')?'is-invalid':''}}" type="email" name="correo" id="correo"
        value="{{isset($usuario->correo)?$usuario->correo:old('correo')}}">
    {!! $errors->first('correo','<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="categoria" class="control-label">{{'Categoria'}}</label>
    <select name="categoria_id" id="categoria_id" class=" form-control">
        @foreach($categorias as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="empresa" class="control-label">{{'Categoria'}}</label>
    <select name="empresa_id" id="cempresa_id" class=" form-control">
        @foreach($empresas as $empresa)
        <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
        @endforeach
    </select>
</div>
<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('usuarios')}}">Regresar </a>