@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/empresas/'.$empresa->id)}}" method="post" enctype="multipart/form-data">
{{ csrf_field()}}
{{ method_field('PATCH')}}
@include('empresas.form',['Modo'=>'editar'])
</form>
</div>
@endsection