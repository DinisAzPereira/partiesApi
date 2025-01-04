<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Adicionar role_id e chave estrangeira à tabela users.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable(); // Adiciona a coluna role_id
            $table->foreign('role_id')->references('id')->on('roles'); // Define a chave estrangeira
        });
    }

    /**
     * Reverter as alterações feitas na tabela users.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']); // Remove a chave estrangeira
            $table->dropColumn('role_id');   // Remove a coluna role_id
        });
    }
};
