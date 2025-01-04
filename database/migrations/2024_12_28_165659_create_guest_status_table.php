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
        Schema::create('guest_status', function (Blueprint $table) {
            $table->id(); // ID do status
            $table->unsignedBigInteger('user_id'); // FK para users
            $table->unsignedBigInteger('party_id'); // FK para parties
            $table->string('status')->default('pending'); // Status do convite (pending, accepted, declined)
            $table->foreign('user_id')->references('id')->on('users'); // Chave estrangeira
            $table->foreign('party_id')->references('id')->on('parties'); // Chave estrangeira
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('guest_status');
    }
};
