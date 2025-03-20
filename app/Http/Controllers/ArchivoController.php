<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;

class ArchivoController extends Controller
{
    // Obtener archivos con estado = 1
    public function getArchivos(Request $request)
    {
      
        $archivos = Archivo::where('estado', 1)->get();
        return response()->json($archivos);
    }

    // Crear un nuevo archivo
    public function storeArchivos(Request $request)
    {
        $request->validate([
            'directorio' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'estado' => 'required|integer',
            'is_visible' => 'required|in:SI,NO' // Validación para "SI" o "NO"
        ]);

        $archivo = Archivo::create([
            'directorio' => $request->directorio,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'is_visible' => $request->is_visible // Almacenar "SI" o "NO"
        ]);

        return response()->json([
            'message' => 'Archivo creado exitosamente',
            'archivo' => $archivo
        ], 200);
    }

    // Actualizar un archivo existente
    public function updateArchivos(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:archivos,id',
            'directorio' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'estado' => 'required|integer',
            'is_visible' => 'required|in:SI,NO' // Validación para "SI" o "NO"
        ]);

        $archivo = Archivo::findOrFail($request->id);
        $archivo->update([
            'directorio' => $request->directorio,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'is_visible' => $request->is_visible // Almacenar "SI" o "NO"
        ]);

        return response()->json([
            'message' => 'Archivo actualizado exitosamente',
            'archivo' => $archivo
        ]);
    }

    // Eliminar un archivo
    public function deleteArchivos(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:archivos,id'
        ]);

        Archivo::findOrFail($request->id)->delete();

        return response()->json(['message' => 'Archivo eliminado exitosamente']);
    }
}
