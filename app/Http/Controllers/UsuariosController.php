<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Empresas;
use App\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios=Usuarios::paginate(10);
        return view('usuarios.index',compact('usuarios'));
    }

    public function create()
    {
        $categorias=Categorias::all();
        $empresas=Empresas::all();
        return view('usuarios.create',compact('categorias','empresas'));
    }

    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellidos'=>'required|string|max:100',
            'correo'=>'required|string|max:100',
            'categoria_id'=>'required|int',
            'empresa_id'=>'required|int',
        ];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $datosUsuario= request()->except('_token');
        Usuarios::insert($datosUsuario);
        return redirect('usuarios')->with('Mensaje','Usuario agregado con èxito');
    }

    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuarios::findOrFail($id);
        $categorias = Categorias::all();
        $empresas = Empresas::all();
        return view('usuarios.edit',compact('categorias','usuario','empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellidos'=>'required|string|max:100',
            'correo'=>'required|string|max:100',
            'categoria_id'=>'required|int',
            'empresa_id'=>'required|int',
        ];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $datosUsuario = request()->except(['_token','_method']);
        $usuario = Usuarios::findOrFail($id);
        Usuarios::where('id','=',$id)->update($datosUsuario);
        return redirect('usuarios')->with('Mensaje','Usuario modificado con èxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuarios::findOrFail($id);
        Usuarios::destroy($id);
        return redirect('usuarios')->with('Mensaje','Usuario Eliminado con èxito');
    }
}
