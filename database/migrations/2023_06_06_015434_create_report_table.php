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
        Schema::create('report', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_incident')->unique();
            $table->foreign('id_incident')->references('id')->on('incident')->onDelete('cascade');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedTinyInteger('id_service');
            $table->foreign('id_service')->references('id')->on('service')->onDelete('cascade');

            $table->unsignedBigInteger('id_companies');
            $table->foreign('id_companies')->references('id')->on('service_companies')->onDelete('cascade');

            $table->string('title', 80);
            $table->string('implicated');
            $table->string('creation_date');
            $table->string('description_process');
            $table->smallInteger('resolution_time',false,true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
