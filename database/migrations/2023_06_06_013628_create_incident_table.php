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
        Schema::create('incident', function (Blueprint $table) {
            $table->id('id');

            //onDelete(cascade) => Indica que cuando se elimina un usuario, las filas relacionadas también se eliminarán en cascada.
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedTinyInteger('id_service');
            $table->foreign('id_service')->references('id')->on('service')->onDelete('cascade');
            
            
            $table->string('subject',60);
            /*Valores especiales de MySQL se evaluarán al momento de la inserción para obtener la 
             fecha y hora actuales del sistema.*/
            $table->date('date')->default(date('Y-m-d'));
            $table->time('hour')->default(date('H:i:s'));
            $table->string('file_path')->nullable();
            $table->string('location',120);
            $table->string('urgency',45);
            $table->string('impact',60);
            $table->string('description');
            $table->char('state',1)->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident');
    }
};
