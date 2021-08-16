<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCometidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cometidos', function (Blueprint $table) {
            $table->id();

            $table->date('fecha_emicion');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->string('objetivo');
            $table->string('dias_c_pernoctar');
            $table->string('dias_s_pernoctar');
            $table->integer('tipo_transporte_ida');
            $table->integer('tipo_transporte_regreso');
            $table->string('progreso');

            $table->enum('estado',[0, 1, 2, 3])->default(0);

            $table->unsignedBigInteger('automovil_id')->nullable();
            $table->unsignedBigInteger('item_presupuestario_id');
            $table->unsignedBigInteger('user_solicita_id');
            $table->unsignedBigInteger('user_jefe_id');
            $table->unsignedBigInteger('user_aprueba_id')->nullable();

            $table->foreign('automovil_id')->references('id')->on('automovils')->onDelete('cascade');
            $table->foreign('item_presupuestario_id')->references('id')->on('item_presupuestarios')->onDelete('cascade');
            $table->foreign('user_solicita_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_jefe_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_aprueba_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('cometidos');
    }
}
