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
        Schema::create('parties', function (Blueprint $table) {
            $table->id(); // id da festa
            $table->string('name'); // Nome da festa
            $table->date('date'); // Data da festa
            $table->string('location'); // local da festa
            $table->unsignedBigInteger('user_id'); 
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps(); // campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parties'); // Remove a tabela se a migração for revertida
    }
};
