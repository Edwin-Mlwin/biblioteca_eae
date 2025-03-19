<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoriaController extends Controller
{
    // Listar todas las categorías
    public function index()
    {
        $categorias = Categoria::all(); // Carga todas las categorías
        return view('categoria.index', compact('categorias'));
    }

    // Mostrar formulario para crear una nueva categoría
    public function create()
    {
        return view('categoria.create');
    }

    // Guardar una nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            '',
            ''
            // Añade otras reglas de validación según los campos
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente');
    }

    // Mostrar formulario para editar una categoría
    public function edit($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('categorias.index')->with('error', 'Categoría no encontrada');
        }

        return view('categoria.edit', compact('categoria'));
    }

    // Actualizar una categoría
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            // Añade otras reglas de validación según los campos
        ]);

        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->update($request->all());
            return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('categorias.index')->with('error', 'Categoría no encontrada');
        }
    }

    // Eliminar una categoría
    public function destroy($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('categorias.index')->with('error', 'Categoría no encontrada');
        }
    }
}
