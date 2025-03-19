<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsuarioController extends Controller
{
    // Listar usuarios
    public function index()
    {
        $usuarios = User::all(); // Corrige la variable para que sea coherente con el nombre de la vista
        return view("usuarios.index", compact("usuarios"));
    }

    // Mostrar formulario para crear un nuevo usuario
    public function create()
    {
        return view("usuarios.create");
    }

    // Guardar un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'estado' => 'required|integer|max:2',
            // Añade más campos según sea necesario
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encripta la contraseña
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar formulario para editar un usuario existente
    public function edit($id)
    {
        try {
            $usuario = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado.');
        }

        return view('usuarios.edit', compact('usuario'));
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            // Puedes validar otros campos si es necesario
        ]);

        try {
            $usuario = User::findOrFail($id);
            $usuario->update($request->except('password')); // Excluye la contraseña si no se va a actualizar

            if ($request->filled('password')) {
                $usuario->update(['password' => bcrypt($request->password)]); // Encripta si la contraseña fue enviada
            }

            return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado.');
        }
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();
            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado.');
        }
    }
}
