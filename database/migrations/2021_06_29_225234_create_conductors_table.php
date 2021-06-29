<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductors', function (Blueprint $table) {
            $table->id();

            $table->string('tipo_licencia');
            $table->integer('annos_experiencia');
            $table->string('nombre_conductor');
            $table->string('apellido_p_conductor');
            $table->string('apellido_m_conductor');
            $table->integer('telefono_conductor');
            $table->string('direccion_conductor');

            $table->enum('estado',[0, 1])->default(1);

            $table->unsignedBigInteger('automovil_id');

            $table->foreign('automovil_id')->references('id')->on('automovils')->onDelete('cascade');

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
        Schema::dropIfExists('conductors');
    }
}
