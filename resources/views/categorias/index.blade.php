@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{Session::get('Mensaje')}} 
    </div>
@endif
    <a href="{{url('categorias/create')}}" class="btn btn-success">Agregar categoria </a><br><br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Detalle</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{$categoria->nombre}} </td>
            <td>{{$categoria->detalle}} </td>
            <td>
                <a class="btn btn-warning" href="{{ url('/categorias/'.$categoria->id.'/edit')}}">
                Editar
             </a>
                <form action="{{ url('/categorias/'.$categoria->id)}}" method="post" style="display: inline">
                {{csrf_field()}}
                {{ method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$categorias->links()}}
</div>
@endsection