<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'directorio',
        'descripcion',
        'estado',
        'is_visible'
    ];
    public function textos()
    {
        return $this->hasMany(Texto::class, 'id_archivos');
    }
}
