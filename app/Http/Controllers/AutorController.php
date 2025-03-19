<?php

namespace App\Http\Controllers;
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AutorController extends Controller
{
    // Listar todos los autores
    public function index()
    {
        $autores = Autor::all(); // Corregí el nombre de la variable a "autores"
        return view('autores.index', compact('autores'));
    }

    // Mostrar el formulario para crear un nuevo autor
    public function create()
    {
        return view('autores.create');
    }

    // Guardar un nuevo autor
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|integer',
        ]);

        // por falso Si la validación falla, redirigir con errores
        if ($validator->fails()) {
            return redirect()->route('autores.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Crear el autor
        Autor::create($validator->validated());

        return redirect()->route('autores.index')
                         ->with('success', 'Autor creado correctamente'); // Corregí el mensaje de éxito
    }

    // Mostrar el formulario para editar un autor
    public function edit($id)
    {
        try {
            $autor = Autor::findOrFail($id);
            return view('autores.edit', compact('autor'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('autores.index')
                             ->with('error', 'Autor no encontrado');
        }
    }

    // Actualizar un autor
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'biografia' => 'nullable|string',
        ]);

        // Si la validación falla, redirigir con errores
        if ($validator->fails()) {
            return redirect()->route('autores.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            // Actualizar el autor
            $autor = Autor::findOrFail($id);
            $autor->update($validator->validated());

            return redirect()->route('autores.index')
                             ->with('success', 'Autor actualizado correctamente');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('autores.index')
                             ->with('error', 'Autor no encontrado');
        }
    }

    // Eliminar un autor
    public function destroy($id)
    {
        try {
            $autor = Autor::findOrFail($id);
            $autor->delete();

            return redirect()->route('autores.index')
                             ->with('success', 'Autor eliminado correctamente');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('autores.index')
                             ->with('error', 'Autor no encontrado');
        }
    }
}