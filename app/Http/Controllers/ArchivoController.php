<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;

class ArchivoController extends Controller
{
    //listar archivos
    public function index()
    {
        $Archivos =Archivo::all();
        return view("archivos.index.", compact("archivos"));
    }

    //crear un nuevo archivo

    public function create()
    {
        return view("archivos.create");
    }

    //guardar un nuevo archivo

    public function store(Request $request)
    {
        Archivo::create($request->all());
        return redirect()->route("archivo.index")->with('seccess', 'archivo creado correctamente');
    }

    //editar un archivo

    public function edit($id)
    {
        $archivo =Archivo::findOrFail($id);
        return view('archivos.edit', compact('archivo'));
    }

    //actualizar un archivo

    public function update(Request $request, $id)
    {
        $archivo =Archivo::findOrFail($id);
        $archivo->update($request->all());
        return redirect()->route('archivos.index.')->with('seccess','archivo actualizado correctamente');
    }

    //eliminar un archivo

    public function destroy($id)
    {
        Archivo::findOrFail($id)->delete();
        return redirect()->route('archivos.index')->with('seccess','archivo eliminado correctamente');
    }
}
