<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=Categorias::paginate(10);
        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEmpleado = request()->all();
        $campos=[
            'nombre'=>'required|string|max:100',
            'detalle'=>'required|string|max:100',
        ];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $datosCategoria = request()->except('_token');
        Categorias::insert($datosCategoria);
        return redirect('categorias')->with('Mensaje',' agregado con èxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categorias::findOrFail($id);
        return view('categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'detalle'=>'required|string|max:100',
        ];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datoscategoria = request()->except(['_token','_method']);
        $categoria = Categorias::findOrFail($id);
        Categorias::where('id','=',$id)->update($datoscategoria);
        return redirect('categorias')->with('Mensaje','Empresa modificado con èxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);
        Categorias::destroy($id);
        return redirect('categoria')->with('Mensaje','Empresa Eliminado con èxito');
    }
}
