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
            $table->unsignedBigInteger('admin_id');

            // Definindo 'admin_id' como chave estrangeira que referencia a tabela 'admins'
            $table->foreign('admin_id')->references('id')->on('register_admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropForeign(['admin_id']);
            
            // Remover a coluna 'admin_id'
            $table->dropColumn('admin_id');
        });
    }
};
