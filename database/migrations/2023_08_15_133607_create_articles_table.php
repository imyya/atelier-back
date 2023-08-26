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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('libelle',55);
            $table->integer('prix');
            $table->integer('stock');
            $table->foreignId('categorie_id')->constrained('categories');
            $table->string('ref',255);
            $table->string('image')->nullable(); // Colonne pour le chemin de la photo
            $table->softDeletes();




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
