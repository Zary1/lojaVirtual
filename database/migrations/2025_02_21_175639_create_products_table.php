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
        Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');  
    $table->string('image');  
    $table->text('description');  
    $table->decimal('price', 10, 2);  
    $table->enum('category', ['telefone', 'computador', 'tablete','cameras']);  
    $table->boolean('is_on_sale')->default(false);  
    $table->decimal('discount_percentage', 5, 2)->nullable();  
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
