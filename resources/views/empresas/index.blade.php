@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{Session::get('Mensaje')}} 
    </div>
@endif
    <a href="{{url('empresas/create')}}" class="btn btn-success">Agregar Empresa </a><br><br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empresas as $empresa)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{$empresa->nombre}} </td>
            <td>
                <a class="btn btn-warning" href="{{ url('/empresas/'.$empresa->id.'/edit')}}">
                Editar
             </a>
                <form action="{{ url('/empresas/'.$empresa->id)}}" method="post" style="display: inline">
                {{csrf_field()}}
                {{ method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$empresas->links()}}
</div>
@endsection