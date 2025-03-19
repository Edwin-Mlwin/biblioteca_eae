<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'

    ];
    public function textos(){
        return $this->hasMany(Texto::class, 'id_categoria');
    }

}
