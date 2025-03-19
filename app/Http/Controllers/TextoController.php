<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Texto;
use function PHPUnit\Framework\returnArgument;

class TextoController extends Controller
{
    //listar todo los texto
    public function index()
    {
        $texto = Texto::all();
        return view("textos.index", compact("textos"));
    }

    //crear un nuevo texto

    public function create()
    {
        return view("textos.create");
    }

    //guardar un nuevo texto

    public function store(Request $request)
    {
        Texto::create($request->all());
        return redirect()->route("textos.index")->with("success","texto creado correctamente");
    }

    //editar un texto

    public function edit($id)
    {
        $Texto = Texto::findOrFail($id);
        return view("textos.edit", compact("texto"));
    }

    //actualizar un texto

    public function update(Request $request, $id)
    {
        $texto = Texto::findOrFail($id);
        $texto->update($request->all());
        return redirect()->route("textos.index")->with("success","texto actualizado correctamente");
    }

    //eliminar un texto

    public function destroy($id)
    {
        Texto::findOrFail($id)->delete();
        return redirect()->route("textos.index")->with("success","texto eliminado correctamente");
    }
}
