<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('revisoes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('veiculo_id')
                ->constrained()
                ->onDelete('cascade');

            $table->date('data');
            $table->integer('km');
            $table->string('local');
            $table->decimal('valor', 10, 2)->nullable();

            $table->timestamps();
            $table->softDeletes(); // 👈 SOFT DELETE
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revisoes');
    }
};