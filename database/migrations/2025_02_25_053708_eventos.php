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
        Schema::create('eventos', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('organizadors_id')->constrained('organizadors');
            $table->foreignId('foros_id')->constrained('foros');

            $table->string('title', 255);
            $table->dateTime('start_date')->nullable()->default(null);
            $table->dateTime('end_date')->nullable()->default(null);

            $table->string('tipo_evento', 35);
            $table->text('notas_generales');
            $table->text('notas_cta');

            // Agregar el campo deleted_at para SoftDeletes
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
