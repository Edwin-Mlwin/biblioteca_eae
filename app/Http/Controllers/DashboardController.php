<?php

namespace App\Http\Controllers;


use App\Models\User;  // Si estás utilizando el modelo de User


class DashboardController extends Controller
{
    public function index()
    {
        // Obtienes los usuarios, si tienes el campo 'estado' en tu modelo de User
        $usuarios = User::all();

        // Retorna la vista 'dashboard' con los usuarios
        return view('dashboard', compact('usuarios'));
    }
}