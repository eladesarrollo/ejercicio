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
        Schema::create('asignacions', function (Blueprint $table) {
            
            $table->engine="InnoDB";
            
            $table->id();
            $table->bigInteger('cooperante_id')->unsigned();
            $table->bigInteger('proyecto_id')->unsigned();            
            $table->date('fecha');
            $table->decimal('monto', 8,  2);
            $table->timestamps();
            
            $table->foreign('cooperante_id')->references('id')->on('cooperantes')->onDelete("cascade");
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacions');
    }
};
