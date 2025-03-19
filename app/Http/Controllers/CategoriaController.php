<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class CategoriaController extends Controller
{
    //listar toda los textos en categorias
    public function index()
    {
        return view('categoria.index', compact('categorias'));
    }

    //crear una nueva categoria

    public function create()
    {
        return view('categoria.create');
    }

    //guardar la nueva categoria

    public function store(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success','categoria creada correctamente');
    }

    //editar una nueva categoria

    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    //actualizar una categoria

    public function update($id, Request $request)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success','categoria actualizado correctamente');
    }

    //eliminar una categoria

    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();
        return redirect()->route('categotias.index')->with('success','categoria eliminado correctamente');
    }
}
