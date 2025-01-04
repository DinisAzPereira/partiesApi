<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Criar a tabela roles.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // ID do papel
            $table->string('name'); // Nome da role (admin, user, guest)
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverter a criação da tabela roles.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
