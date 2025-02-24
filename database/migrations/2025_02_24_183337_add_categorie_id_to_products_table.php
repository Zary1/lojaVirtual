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
            //
            $table->unsignedBigInteger('categorie_id');

            // Definindo 'categorie_id' como chave estrangeira que referencia a tabela 'categories'
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            
            $table->dropForeign(['categorie_id']);
            
            // Remover a coluna 'categorie_id'
            $table->dropColumn('categorie_id');
        
        });
    }
};
