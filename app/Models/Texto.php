<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_categoria',
        'id_autor',
        'id_archivo',
        'titulo',
        'sub_titulo', 
        'año',
        'descripcion',
        'resumen',
        'estado',
        'estado_texto',
        'portada'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'id_autor');
    }

    public function archivo()
    {
        return $this->belongsTo(Archivo::class, 'id_archivo');
    }
}
