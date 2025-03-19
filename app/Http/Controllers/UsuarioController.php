<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Listar usuarios
    public function index()
    {
        $usuario = User::all();
        return view("usuarios.index", compact("usuarios"));
    }

    // la parte donde sera para crear un nuevo usuario
    public function create()
    {
        return view("usuarios.create");
    }
    
    // funcion para Guardar un nuevo usuario
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    // funcion de Editar un usuario existente
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    //funcion Actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // funcion Eliminar un usuario
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
