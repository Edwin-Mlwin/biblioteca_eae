<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    use HasFactory;

    protected $table = 'textos'; // Nombre de la tabla en la BD
    protected $primaryKey = 'id'; // Clave primaria

    public $timestamps = true; // Mantener timestamps activados

    // Indicar los nombres correctos de las columnas de timestamps
    const CREATED_AT = 'fecha_hora_creado';
    const UPDATED_AT = 'fecha_hora_actualizado';

    // Definir constantes para estado
    const ESTADO_ACTIVO = 1;
    const ESTADO_INACTIVO = 2;

    // Definir constantes para estado_texto
    const ESTADO_TEXTO_PUBLICADO = 'publicado';
    const ESTADO_TEXTO_BORRADOR = 'borrador';

    protected $fillable = [
        'id_categoria',
        'id_autor',
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
