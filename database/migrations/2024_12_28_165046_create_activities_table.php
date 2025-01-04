<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id(); // ID da atividade
            $table->string('name'); // Nome da atividade
            $table->string('type'); // Tipo da atividade
            $table->unsignedBigInteger('party_id'); // FK para parties
            $table->foreign('party_id')->references('id')->on('parties'); // Chave estrangeira
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('activities');
    }
};