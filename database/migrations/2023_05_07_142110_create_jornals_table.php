<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJornalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jornals', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('imagem');
            $table->text('descricao');
            $table->decimal('preco',16,2);
            $table->string('link');
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('categoria_id')->onDelete('cascade');
            $table->enum('status',['adicionado','revisado','pronto'])->default('adicionado');
            $table->enum('visibilidade',['publica','admin','oculta'])->default('publica');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jornals');
    }
}
