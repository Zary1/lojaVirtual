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
        Schema::table('products', function (Blueprint $table) {
               // Modifica a coluna category para adicionar 'promocao'
               $table->enum('category', ['telefone', 'computador', 'tablete', 'cameras', 'promocao'])
               ->default('telefone') 
               ->change();

           // Adiciona a nova coluna 'promocao'
           $table->boolean('promocao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('promocao');
            $table->enum('category', ['telefone', 'computador', 'tablete', 'cameras', 'promocao'])
            ->default('telefone') 
            ->change();
        });
    }
};
