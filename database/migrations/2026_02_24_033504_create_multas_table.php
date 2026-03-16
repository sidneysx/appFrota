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
        Schema::create('multas', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 10);
            $table->string('setor');
            $table->string('veiculo');
            $table->string('responsavel');
            $table->text('descricao');
            $table->string('numero_auto')->unique();
            $table->date('data_recebimento');
            $table->date('data_vencimento');
            $table->enum('situacao', [
                'Pendente',
                'Pago',
                'Recorrida',
                'Cancelada',
                'Vencida'
            ])->default('Pendente');
            $table->string('pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multas');
    }
};
