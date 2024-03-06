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
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_user');
            $table->string('apellidos_user');
            $table->string('correo_user');
            $table->date('fecha_user');
            $table->string('pwd_user');
            $table->unsignedBigInteger('id_rol');
            $table->unsignedBigInteger('id_sede');
            $table->foreign('id_rol')->references('id')->on('tbl_roles')->onDelete('cascade');
            $table->foreign('id_sede')->references('id')->on('tbl_sedes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_users');
    }
};
