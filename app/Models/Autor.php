<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
        'año',
        'descripcion'
    ];
    public function textos()
    {
        return $this->hasMany(Texto::class, 'id_autor');
    }
}
