<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->uniqid();
            $table->string('renavan')->nullable(); // link para PDF do documento
            $table->string('veiculo'); // modelo do carro, ex: Fiat Strada
            $table->year('ano')->nullable(); // ano do veículo
            $table->string('tipo')->nullable(); // tipo do veículo: picape, sedan, SUV...
            $table->string('setor')->nullable();
            $table->string('responsavel')->nullable();
            $table->enum('dpl', ['FROTA SUL'])->default('FROTA SUL');
            $table->string('revisao')->nullable(); // link por enquanto vazio
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};