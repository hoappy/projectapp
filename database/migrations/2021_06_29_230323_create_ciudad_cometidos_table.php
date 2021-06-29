<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadCometidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudad_cometidos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ciudad_id');
            $table->unsignedBigInteger('cometido_id');

            $table->foreign('ciudad_id')->references('id')->on('ciudads')->onDelete('cascade');
            $table->foreign('cometido_id')->references('id')->on('cometidos')->onDelete('cascade');

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
        Schema::dropIfExists('ciudad_cometidos');
    }
}
