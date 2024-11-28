<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titolo del libro
            $table->text('description')->nullable(); // Descrizione (opzionale, max 800 caratteri)
            $table->unsignedInteger('pages')->nullable(); // Numero di pagine (opzionale)
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade'); // Relazione con autori
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Relazione con categorie
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};

