<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Texto;

class TextoController extends Controller
{
    // Obtener todos los textos donde estado = 1
    public function getTextos(Request $request)
    {
        
        $textos = Texto::where('estado', 1)->get();
        return response()->json($textos);
    }

    // Crear un nuevo texto
    public function storeTextos(Request $request)
    {
        $request->validate ([
            'id_categoria' => 'required|integer',
            'id_autor' => 'required|integer',
            'titulo'=> 'required|string|max:200',
            'sub_titulo'=> 'nullable|string|max:200',
            'año'=> 'required|integer',
            'descripcion'=> 'required|string|max::500',
            'resumen'=> 'required|string|max:500',
            'estado'=> 'required|integer',   //la parte donde se vera activo 1 o inactivo 2
            'estado_texto' => 'required|string|max:200',
            'portada'=> 'nullable|string|max:200'
        ]);

        $texto = Texto::create([
            'id_categoria' => $request->id_categoria,
            'id_autor'=> $request->id_autor,
            'titulo'=> $request->id_titulo,
            'sub_titulo'=> $request->sub_titulo,
            'año'=> $request->año,
            'descripcion'=> $request->descripcion,
            'resumen'=> $request->resumen,
            'estado'=> $request->estado,
            'estado_texto'=> $request->estado_texto,
            'portada'=> $request->portada,
            
        ]);

        return response()->json([
            'mesasge'=> 'texto creado correctamente',
            'texto' => $texto
        ], 200);
    }

    // Actualizar un texto
    public function updateTextos(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:textos,id',
            'id_categoria' => 'required|integer',
            'id_autor' => 'required|integer',
            'titulo' => 'required|string|max:255',
            'sub_titulo' => 'nullable|string|max:255',
            'año' => 'required|integer',
            'descripcion' => 'required|string|max:500',
            'resumen' => 'required|string|max:500',
            'estado' => 'required|integer', // 1: activo, 2: inactivo
            'estado_texto' => 'required|string|max:255',
            'portada' => 'nullable|string|max:255',
        ]);

        $texto = Texto::findOrFail($request->id);
        $texto->update([
            'id_categoria' => $request->id_categoria,
            'id_autor' => $request->id_autor,
            'titulo' => $request->titulo,
            'sub_titulo' => $request->sub_titulo,
            'año' => $request->año,
            'descripcion' => $request->descripcion,
            'resumen' => $request->resumen,
            'estado' => $request->estado,
            'estado_texto' => $request->estado_texto,
            'portada' => $request->portada,
        ]);

        return response()->json([
            'message' => 'Texto actualizado exitosamente',
            'texto' => $texto
        ]);
    }

    // Eliminar un texto
    public function deleteTextos(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:textos,id'
        ]);

        $texto = Texto::findOrFail($request->id);
        $texto->delete();

        return response()->json(['message' => 'Texto eliminado exitosamente']);
    }
}
