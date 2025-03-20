<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    // Obtener todos los autores
    public function getAutores(Request $request)
    {
       
        $autores = Autor::where('estado', 1)->get();
        return response()->json($autores);
    }

    // Crear un nuevo autor
    public function storeAutores(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255|unique:autores',
            'año' => 'required|integer',
            'descripcion' => 'required|string|max:500',
        ]);

        // Crear un nuevo autor en la base de datos
        $autor = Autor::create([
            'nombre' => $request->nombre,
            'año' => $request->año,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json([
            'message' => 'Autor creado exitosamente',
            'autor' => $autor
        ], 200);
    }

    // Actualizar un autor existente
    public function updateAutores(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'id' => 'required|exists:autores,id',
            'nombre' => 'required|string|max:255|unique:autores,nombre,' . $request->id,
            'año' => 'required|integer',
            'descripcion' => 'required|string|max:500',
        ]);

        // Encontrar el autor por su ID y actualizarlo
        $autor = Autor::findOrFail($request->id);
        $autor->update([
            'nombre' => $request->nombre,
            'año' => $request->año,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json([
            'message' => 'Autor actualizado exitosamente',
            'autor' => $autor
        ]);
    }

    // Eliminar un autor
    public function deleteAutores(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'id' => 'required|exists:autores,id'
        ]);

        // Eliminar el autor
        Autor::findOrFail($request->id)->delete();

        return response()->json(['message' => 'Autor eliminado exitosamente']);
    }
}
