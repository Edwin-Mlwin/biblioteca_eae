<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // Obtener categorías con estado = 1
    public function getCategorias(Request $request)
    {
        $categorias = Categoria::where('estado', 1)->get();
        return response()->json($categorias);
    }

    // Crear una nueva categoría
    public function storeCategorias(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias',
            'descripcion' => 'required|string|max:500',
            'estado' => 'required|integer'
        ]);

        $categoria = Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado
        ]);

        return response()->json([
            'message' => 'Categoría creada exitosamente',
            'categoria' => $categoria
        ], 200);
    }

    // Actualizar una categoría existente
    public function updateCategorias(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $request->id,
            'descripcion' => 'required|string|max:200',
            'estado' => 'required|integer'
        ]);

        $categoria = Categoria::findOrFail($request->id);
        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado
        ]);

        return response()->json([
            'message' => 'Categoría actualizada exitosamente',
            'categoria' => $categoria
        ]);
    }

    // Eliminar una categoría
    public function deleteCategorias(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categorias,id'
        ]);

        Categoria::findOrFail($request->id)->delete();

        return response()->json(['message' => 'Categoría eliminada exitosamente']);
    }
}
