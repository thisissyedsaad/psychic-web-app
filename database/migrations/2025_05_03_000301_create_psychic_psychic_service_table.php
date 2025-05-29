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
        Schema::create('psychic_psychic_service', function (Blueprint $table) {
            $table->unsignedBigInteger('psychic_id');
            $table->unsignedBigInteger('psychic_service_id');
            
            $table->foreign('psychic_id')->references('id')->on('psychics')->onDelete('cascade');
            $table->foreign('psychic_service_id')->references('id')->on('psychic_services')->onDelete('cascade');
            
            $table->primary(['psychic_id', 'psychic_service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('psychic_psychic_service');
    }
};
