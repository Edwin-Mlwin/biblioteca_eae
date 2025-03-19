<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;

class ArchivoController extends Controller
{
    // Listar archivos
    public function index()
    {
        $archivos = Archivo::all(); // Corregido: Se usa minúscula en la variable
        return view("archivos.index", compact("archivos")); // Se eliminó el "." final
    }

    // Formulario para crear un nuevo archivo
    public function create()
    {
        return view("archivos.create");
    }

    // Guardar un nuevo archivo
    public function store(Request $request)
    {
        Archivo::create($request->all());
        return redirect()->route("archivos.index")->with('success', 'Archivo creado correctamente'); // Corregido "seccess"
    }

    // Formulario para editar un archivo existente
    public function edit($id)
    {
        $archivo = Archivo::findOrFail($id);
        return view('archivos.edit', compact('archivo'));
    }

    // Actualizar un archivo
    public function update(Request $request, $id)
    {
        $archivo = Archivo::findOrFail($id);
        $archivo->update($request->all());
        return redirect()->route('archivos.index')->with('success', 'Archivo actualizado correctamente'); // Corregido "seccess" y "." en "index."
    }

    // Eliminar un archivo
    public function destroy($id)
    {
        Archivo::findOrFail($id)->delete();
        return redirect()->route('archivos.index')->with('success', 'Archivo eliminado correctamente'); // Corregido "seccess"
    }
}
