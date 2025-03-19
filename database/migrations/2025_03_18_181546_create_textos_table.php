<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('textos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_categoria'); // Relación con la tabla de categorías
            $table->unsignedBigInteger('id_autor'); // Relación con la tabla de autores
            $table->unsignedBigInteger('id_archivo')->nullable();  // Relación con la tabla archivos (opcional)
            $table->string('titulo'); // Título del texto
            $table->string('sub_titulo')->nullable(); // Subtítulo del texto
            $table->integer('año'); // Año del texto
            $table->text('descripcion'); // Descripción del texto
            $table->text('resumen'); // Resumen del texto
            $table->integer('estado'); // Estado del texto
            $table->string('estado_texto')->nullable(); // Estado detallado del texto
            $table->string('portada'); // Para la portada del libro
            $table->timestamp('fecha_hora_creado')->useCurrent(); // Fecha de creación
            $table->timestamp('fecha_hora_actualizado')->nullable()->useCurrentOnUpdate(); // Fecha de actualización

            // Definición de claves foráneas
            $table->foreign('id_categoria')
                ->references('id')->on('categorias')
                ->onDelete('cascade');

            $table->foreign('id_autor')
                ->references('id')->on('autores')
                ->onDelete('cascade');

            $table->foreign('id_archivo')
                ->references('id')->on('archivos')
                ->onDelete('set null'); // Si el archivo es eliminado, id_archivo será NULL

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('textos');
    }
};
