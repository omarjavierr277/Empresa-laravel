<?php

namespace App\Http\Controllers;

use App\Empresas;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empresas']=Empresas::paginate(10);
        return view('empresas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
        ];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosEmpresa = request()->except('_token');
        Empresas::insert($datosEmpresa);
        return redirect('empresas')->with('Mensaje','Empresa agregado con èxito');
    }

    public function show(Empresas $empresas)
    {
        
    }

    public function edit($id)
    {
        $empresa = Empresas::findOrFail($id);
        return view('empresas.edit',compact('empresa'));
    }

    public function update(Request $request, $id)
    {
         //
         $campos=[
            'nombre'=>'required|string|max:100',
        ];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $datosempresa = request()->except(['_token','_method']);
        $empresa = Empresas::findOrFail($id);
        Empresas::where('id','=',$id)->update($datosempresa);
        return redirect('empresas')->with('Mensaje','Empresa modificado con èxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresas::findOrFail($id);
        Empresas::destroy($id);
        return redirect('empresas')->with('Mensaje','Empresa Eliminado con èxito');
    }
}
