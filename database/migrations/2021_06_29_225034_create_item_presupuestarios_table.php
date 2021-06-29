<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPresupuestariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_presupuestarios', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_item_presupuestario');
            $table->string('descripcion');

            $table->integer('valor');

            $table->enum('estado',[0, 1])->default(1);

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
        Schema::dropIfExists('item_presupuestarios');
    }
}
