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
        Schema::create('tbl_incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_inc');
            $table->string('desc_inc');
            $table->date('fecha_inc');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_subcat');
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('tecnico');
            $table->foreign('id_user')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->foreign('id_subcat')->references('id')->on('tbl_subcategorias')->onDelete('cascade');
            $table->foreign('id_estado')->references('id')->on('tbl_estados')->onDelete('cascade');
            $table->foreign('tecnico')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_incidencias');
    }
};
