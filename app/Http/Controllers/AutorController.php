<?php

namespace App\Http\Controllers;


use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    //listar todos los autores
    public function index()
    {
        $autor = Autor::all();
        return view("autores.index", compact("autores"));
    }

    //crear un nuevo autor

    public function create()
    {
        return view("autores.create");
    }

    //guardar un nuevo autor

    public function store(Request $request)
    {
        Autor::create($request->all());
        return redirect()->route("autores.index")->with('succes', 'Autore creado correctamente');
    }

    //editar un autor

    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autores.edit', compact('autor'));
    }

    //actualizar autor 
    public function update(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return redirect()->route('autores.index')->with('success','autor actualizado correctamente');
    }

    //eliminar un autor

    public function destroy($id)
    {
        Autor::findOrFail($id)->delete();
        return redirect()->route('autores.index')->with('success','autor eliminado correctamente');
    }
}
