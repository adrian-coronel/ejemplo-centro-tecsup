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
        Schema::create('service_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedTinyInteger('id_service');
            $table->foreign('id_service')->references('id')->on('service')->onDelete('cascade');

            $table->string('contact_number',15)->nullable();
            $table->string('email',100);
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_companies');
    }
};
