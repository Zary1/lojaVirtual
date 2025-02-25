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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Identificador único para o pedido
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Relacionamento com o usuário
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade'); // Relacionamento com o carrinho
            $table->decimal('total', 10, 2); // Valor total do pedido
            $table->enum('status', ['pendente', 'em_processamento', 'enviado', 'entregue', 'cancelado'])->default('pendente'); // Status do pedido
            $table->string('shipping_address'); // Endereço de envio
            $table->string('shipping_method'); // Método de envio
            $table->string('payment_method'); // Método de pagamento (se for o mesmo ou diferente do carrinho)
            $table->timestamps(); // Data de criação e atualização do pedido
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
